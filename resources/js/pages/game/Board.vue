<script setup lang="ts">
import { Head, router, usePage } from '@inertiajs/vue3';
import { VueDraggable } from 'vue-draggable-plus';
import { computed, onBeforeUnmount, onMounted, ref, watch } from 'vue';
import BoardColumnHeading from '@/components/game/BoardColumnHeading.vue';
import BoardSection from '@/components/game/BoardSection.vue';
import ColourKey from '@/components/game/ColourKey.vue';
import ImageLightbox from '@/components/game/ImageLightbox.vue';
import ImagePickerModal from '@/components/game/ImagePickerModal.vue';
import ImageTile from '@/components/game/ImageTile.vue';
import LeaderboardButton from '@/components/game/LeaderboardButton.vue';
import ResultModal from '@/components/game/ResultModal.vue';
import { TRAY, useBoardArrangement } from '@/composables/useBoardArrangement';
import { useStickyEdgeScroll } from '@/composables/useStickyEdgeScroll';
import { useSymphonyPlayer } from '@/composables/useSymphonyPlayer';
import { dragOptions, imageMap, RESULT_PLAYER_KEY } from '@/lib/game';
import GameLayout from '@/layouts/GameLayout.vue';
import { store as storeArrangement } from '@/routes/arrangements';
import type {
    ArrangementResult,
    BoardColumn,
    GameImage,
    Group,
    Player,
} from '@/types';

const props = defineProps<{
    player: Player;
    group: Group;
    answerId: number;
    layout: BoardColumn[];
    slotIds: string[];
    images: GameImage[];
    result: ArrangementResult | null;
}>();

const page = usePage();
const symphony = useSymphonyPlayer();
const imagesById = computed(() => imageMap(props.images));
const board = useBoardArrangement(
    props.slotIds,
    props.images.map((image) => image.id),
);

// Deterministic on the server and during hydration; shuffled once mounted in the browser.
board.reset(props.result?.placements ?? null, { shuffled: false });
onMounted(() => board.reset(props.result?.placements ?? null));

const isLocked = computed(() => props.result !== null);
const isResultOpen = ref(props.result !== null);

const isSubmitting = ref(false);
const lightboxImage = ref<GameImage | null>(null);
const pickerSlotId = ref<string | null>(null);

// Inertia keeps this component mounted when moving between the board and its result,
// so reset the board whenever a different arrangement (or a fresh board) arrives.
watch(
    () => props.result?.id ?? null,
    () => {
        symphony.stop();
        board.reset(props.result?.placements ?? null);
        isResultOpen.value = props.result !== null;
        pickerSlotId.value = null;
        lightboxImage.value = null;
    },
);
const submitError = computed(
    () => Object.values(page.props.errors ?? {})[0] ?? null,
);

const sectionTitles = computed(
    () =>
        new Map(
            props.layout.flatMap((column) =>
                column.rows.flatMap((row) =>
                    row.flatMap((section) =>
                        section.slots.map(
                            (slotId) => [slotId, section.title] as const,
                        ),
                    ),
                ),
            ),
        ),
);

/** A drag ends with a click on some browsers; ignore clicks right after a drop. */
let lastDragEndedAt = 0;
const topBar = ref<HTMLElement | null>(null);
const edgeScroll = useStickyEdgeScroll(topBar);

function onDragEnd(): void {
    lastDragEndedAt = Date.now();
    edgeScroll.stop();
}

function correctness(slotId: string): boolean | null {
    if (!props.result) {
        return null;
    }

    return props.result.pattern[props.slotIds.indexOf(slotId)] === '1';
}

const playingSlotId = computed(() =>
    symphony.playingKey.value === RESULT_PLAYER_KEY
        ? (props.slotIds[symphony.currentStep.value] ?? null)
        : null,
);

function openSlot(slotId: string): void {
    if (Date.now() - lastDragEndedAt < 250) {
        return;
    }

    const imageId = board.lists[slotId][0];

    if (isLocked.value) {
        if (imageId) {
            lightboxImage.value = imagesById.value.get(imageId) ?? null;
        }

        return;
    }

    pickerSlotId.value = slotId;
}

function zoomTrayTile(event: MouseEvent): void {
    if (Date.now() - lastDragEndedAt < 250) {
        return;
    }

    const tile = (event.target as HTMLElement).closest<HTMLElement>('.tile');

    if (tile) {
        lightboxImage.value =
            imagesById.value.get(Number(tile.dataset.image)) ?? null;
    }
}

function placedIn(imageId: number): { slotId: string; title: string } | null {
    const slotId = board.slotOf(imageId);

    return slotId
        ? { slotId, title: sectionTitles.value.get(slotId) ?? '' }
        : null;
}

function placeFromPicker(imageId: number, slotId: string): void {
    board.place(imageId, slotId);
    pickerSlotId.value = null;
}

function clearFromPicker(slotId: string): void {
    board.clearSlot(slotId);
    pickerSlotId.value = null;
}

function submit(): void {
    router.post(
        storeArrangement(props.answerId).url,
        { placements: board.placements.value },
        {
            onStart: () => {
                isSubmitting.value = true;
            },
            onFinish: () => {
                isSubmitting.value = false;
            },
        },
    );
}

const submitLabel = computed(() => {
    if (isSubmitting.value) {
        return 'Submitting…';
    }

    const remaining = props.slotIds.length - board.placedCount.value;

    return remaining > 0
        ? `Submit arrangement (${remaining} to go)`
        : 'Submit arrangement';
});

onBeforeUnmount(() => symphony.stop());
</script>

<template>
    <Head :title="`Group ${group.number} board`" />
    <GameLayout focused>
        <section class="flex min-h-screen flex-col pb-12">
            <!-- Sticky top bar with the tray of images still to place -->
            <div
                ref="topBar"
                class="sticky top-0 z-30 bg-night/94 pt-[env(safe-area-inset-top,0px)] shadow-[0_6px_24px_rgb(0_0_0/.35)] backdrop-blur-xl"
            >
                <div
                    class="flex flex-wrap items-center gap-4 px-[clamp(.8rem,2vw,1.6rem)] py-3"
                >
                    <div class="flex min-w-0 flex-col">
                        <b
                            class="font-display text-[1.35rem] leading-[1.1] font-normal text-gold"
                        >
                            {{ player.name }}
                        </b>
                        <small
                            class="max-w-[60vw] truncate text-[.82rem] text-muted sm:max-w-[42vw]"
                        >
                            Group {{ group.number }} · {{ group.persona }}
                        </small>
                    </div>
                    <div class="flex-1" />
                    <LeaderboardButton />
                    <div class="text-[.95rem] font-bold whitespace-nowrap">
                        <span class="text-gold">{{
                            board.placedCount.value
                        }}</span>
                        / {{ slotIds.length }} placed
                    </div>
                </div>

                <div
                    v-if="!isLocked"
                    class="border-t border-white/8 pt-2.5 pb-3"
                >
                    <p
                        class="px-[clamp(.8rem,2vw,1.6rem)] pb-2 text-[.82rem] text-muted"
                    >
                        Drag an image down into the box where it belongs, or
                        click any box to pick its image from a list. Use the
                        magnifier to see an image large.
                    </p>
                    <VueDraggable
                        v-model="board.lists[TRAY]"
                        v-bind="dragOptions"
                        :data-list="TRAY"
                        class="flex min-h-[104px] [scrollbar-color:var(--color-gold)_transparent] gap-3 overflow-x-auto px-[clamp(.8rem,2vw,1.6rem)] pt-1 pb-1.5"
                        aria-label="Images to place"
                        @start="edgeScroll.start"
                        @end="onDragEnd"
                        @click="zoomTrayTile"
                    >
                        <ImageTile
                            v-for="imageId in board.lists[TRAY]"
                            :key="imageId"
                            :image="imagesById.get(imageId)!"
                            @zoom="lightboxImage = $event"
                        />
                        <p
                            v-if="!board.lists[TRAY].length"
                            class="pointer-events-none self-center text-sm text-muted"
                        >
                            All images are on the board. Drag between boxes to
                            swap, click a box to change its image, or submit.
                        </p>
                    </VueDraggable>
                </div>
            </div>

            <!-- Brief -->
            <div
                class="mx-auto w-full max-w-[1680px] px-[clamp(.8rem,2vw,1.6rem)] pt-6 pb-2.5"
            >
                <div class="flex flex-wrap items-stretch">
                    <div
                        class="skewed z-10 bg-gold px-[1.1rem] py-1.5 font-display text-2xl text-ink shadow-[0_0_0_3px_#fff]"
                    >
                        <span>Group {{ group.number }}</span>
                    </div>
                    <div
                        class="skewed -ml-2 min-w-[260px] flex-1 bg-linear-to-r from-gold-deep from-0% via-[#d8b54a] via-80% to-transparent py-2 pr-10 pl-6 text-ink"
                    >
                        <span>{{ group.persona }}</span>
                    </div>
                </div>
                <p
                    class="mt-4 mb-3 text-[clamp(1rem,1.6vw,1.25rem)] font-semibold"
                >
                    Select and order the most relevant brand story elements and
                    CLM tiles to address the assigned challenge.
                </p>
                <ColourKey />
            </div>

            <!-- Board -->
            <div
                class="mx-auto grid w-full max-w-[1680px] grid-cols-1 items-start gap-[clamp(.8rem,1.4vw,1.4rem)] px-[clamp(.8rem,2vw,1.6rem)] py-4 sm:grid-cols-2 board:grid-cols-[1.05fr_.8fr_2.3fr_2.3fr_1.1fr]"
            >
                <div
                    v-for="column in layout"
                    :key="column.key"
                    class="flex min-w-0 flex-col items-center gap-3.5"
                    :class="
                        column.rows.some((row) => row.length > 1) &&
                        'sm:col-span-2 board:col-span-1'
                    "
                >
                    <BoardColumnHeading :column="column" />
                    <div
                        :class="
                            column.rows.some((row) => row.length > 1)
                                ? 'grid w-full grid-cols-2 items-start gap-x-3 gap-y-3.5'
                                : 'flex w-full flex-col gap-3.5'
                        "
                    >
                        <template
                            v-for="(row, rowIndex) in column.rows"
                            :key="rowIndex"
                        >
                            <BoardSection
                                v-for="section in row"
                                :key="section.key"
                                :class="row.length === 1 && 'col-span-2'"
                                :section="section"
                                :lists="board.lists"
                                :images="imagesById"
                                :locked="isLocked"
                                :correctness="correctness"
                                :playing-slot-id="playingSlotId"
                                @update:list="
                                    (slotId, list) =>
                                        (board.lists[slotId] = list)
                                "
                                @dropped="board.settleDrop"
                                @drag-start="edgeScroll.start"
                                @drag-end="onDragEnd"
                                @open="openSlot"
                                @zoom="lightboxImage = $event"
                            />
                        </template>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-wrap items-center justify-center gap-4 px-4 pt-5"
            >
                <template v-if="!isLocked">
                    <button
                        type="button"
                        class="btn-ghost"
                        @click="board.reset()"
                    >
                        Clear board
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :disabled="!board.isComplete.value || isSubmitting"
                        @click="submit"
                    >
                        {{ submitLabel }}
                    </button>
                </template>
                <button
                    v-else
                    type="button"
                    class="btn"
                    @click="isResultOpen = true"
                >
                    See your score
                </button>
            </div>
            <p
                v-if="submitError"
                class="mt-3 text-center font-semibold text-bad"
                role="alert"
            >
                {{ submitError }}
            </p>
            <p class="mt-6 text-center text-xs font-semibold text-muted">
                INTERNAL USE ONLY – Not for promotional use
            </p>
        </section>

        <ImagePickerModal
            :slot-id="pickerSlotId"
            :slot-title="
                pickerSlotId ? (sectionTitles.get(pickerSlotId) ?? '') : ''
            "
            :order="board.order.value"
            :images="imagesById"
            :current-image-id="
                pickerSlotId ? (board.lists[pickerSlotId][0] ?? null) : null
            "
            :placed-in="placedIn"
            @close="pickerSlotId = null"
            @place="placeFromPicker"
            @clear="clearFromPicker"
        />

        <ImageLightbox :image="lightboxImage" @close="lightboxImage = null" />

        <ResultModal
            v-if="result"
            :open="isResultOpen"
            :result="result"
            :player-name="player.name"
            @close="isResultOpen = false"
        />
    </GameLayout>
</template>
