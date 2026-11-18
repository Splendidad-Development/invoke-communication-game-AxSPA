<script setup lang="ts">
import { nextTick, ref, watch } from 'vue';
import GameModal from '@/components/game/GameModal.vue';
import type { GameImage } from '@/types';

const props = defineProps<{
    /** The slot being filled, or null when the picker is closed. */
    slotId: string | null;
    slotTitle: string;
    order: number[];
    images: Map<number, GameImage>;
    currentImageId: number | null;
    /** Where each image currently sits: section title per image, or undefined when in the tray. */
    placedIn: (imageId: number) => { slotId: string; title: string } | null;
}>();

const emit = defineEmits<{
    close: [];
    place: [imageId: number, slotId: string];
    clear: [slotId: string];
}>();

const selected = ref<number | null>(null);
const track = ref<HTMLElement | null>(null);

watch(
    () => props.slotId,
    async (slotId) => {
        if (!slotId) {
            return;
        }

        selected.value = props.currentImageId;
        await nextTick();

        const current = track.value?.querySelector<HTMLElement>(
            '[aria-pressed="true"]',
        );

        if (current) {
            current.scrollIntoView({ inline: 'center', block: 'nearest' });
        } else if (track.value) {
            track.value.scrollLeft = 0;
        }
    },
);

function step(direction: 1 | -1): void {
    track.value?.scrollBy({
        left: direction * track.value.clientWidth * 0.8,
        behavior: 'smooth',
    });
}

function confirm(): void {
    if (props.slotId && selected.value) {
        emit('place', selected.value, props.slotId);
    }
}

function onKeydown(event: KeyboardEvent): void {
    if (event.key === 'ArrowRight' || event.key === 'ArrowLeft') {
        step(event.key === 'ArrowRight' ? 1 : -1);
    }
}
</script>

<template>
    <GameModal
        :open="slotId !== null"
        labelledby="picker-title"
        @close="emit('close')"
    >
        <div @keydown="onKeydown">
            <h2 id="picker-title" class="m-0 mr-10 mb-1 text-xl font-bold">
                Choose an image for “{{ slotTitle }}”
            </h2>
            <p class="mb-4 text-[.9rem] text-muted">
                Scroll left or right, pick the image that fits this box, then
                place it.
            </p>

            <div class="relative">
                <button
                    type="button"
                    class="absolute top-[calc(50%-30px)] -left-1.5 z-10 size-[46px] cursor-pointer rounded-full bg-gold text-2xl font-extrabold text-ink shadow-[0_6px_20px_rgb(0_0_0/.5)]"
                    aria-label="Previous images"
                    @click="step(-1)"
                >
                    ‹
                </button>
                <div
                    ref="track"
                    class="flex snap-x snap-mandatory gap-4 overflow-x-auto px-0.5 pt-1.5 pb-4"
                >
                    <button
                        v-for="(imageId, index) in order"
                        :key="imageId"
                        type="button"
                        class="group w-[min(440px,78vw)] shrink-0 cursor-pointer snap-center text-left text-cream"
                        :aria-pressed="selected === imageId"
                        @click="selected = imageId"
                        @dblclick="
                            selected = imageId;
                            confirm();
                        "
                    >
                        <div
                            class="relative aspect-[4/3] w-full overflow-hidden rounded-xl bg-white bg-contain bg-center bg-no-repeat transition"
                            :class="
                                selected === imageId
                                    ? 'shadow-[0_0_0_5px_var(--color-gold)]'
                                    : 'group-hover:shadow-[0_0_0_3px_rgb(255_210_31/.6)]'
                            "
                            :style="{
                                backgroundImage: `url(${images.get(imageId)?.url})`,
                            }"
                        >
                            <div
                                v-if="placedIn(imageId)"
                                class="absolute inset-0 flex flex-col items-center justify-center gap-2 bg-night/78 p-4 text-center"
                            >
                                <b
                                    class="inline-flex items-center gap-1.5 rounded-full px-4 py-1.5 text-[.95rem] font-extrabold text-ink"
                                    :class="
                                        placedIn(imageId)?.slotId === slotId
                                            ? 'bg-ok'
                                            : 'bg-gold'
                                    "
                                >
                                    {{
                                        placedIn(imageId)?.slotId === slotId
                                            ? '✓ In this box'
                                            : '✓ Placed'
                                    }}
                                </b>
                                <span
                                    v-if="placedIn(imageId)?.slotId !== slotId"
                                    class="text-sm leading-[1.3] font-semibold text-white [text-shadow:0_1px_6px_rgb(0_0_0/.6)]"
                                >
                                    {{ placedIn(imageId)?.title }}
                                </span>
                            </div>
                        </div>
                        <div
                            class="mt-2 flex justify-between gap-2 text-[.85rem] font-semibold"
                            :class="
                                selected === imageId
                                    ? 'text-gold'
                                    : 'text-muted'
                            "
                        >
                            <span
                                >Image {{ index + 1 }} of
                                {{ order.length }}</span
                            >
                            <span>
                                {{
                                    !placedIn(imageId)
                                        ? 'Not placed yet'
                                        : placedIn(imageId)?.slotId === slotId
                                          ? 'In this box'
                                          : `Placed in: ${placedIn(imageId)?.title}`
                                }}
                            </span>
                        </div>
                    </button>
                </div>
                <button
                    type="button"
                    class="absolute top-[calc(50%-30px)] -right-1.5 z-10 size-[46px] cursor-pointer rounded-full bg-gold text-2xl font-extrabold text-ink shadow-[0_6px_20px_rgb(0_0_0/.5)]"
                    aria-label="Next images"
                    @click="step(1)"
                >
                    ›
                </button>
            </div>

            <div class="mt-1.5 flex flex-wrap justify-end gap-3">
                <button
                    v-if="currentImageId"
                    type="button"
                    class="btn-ghost"
                    @click="slotId && emit('clear', slotId)"
                >
                    Empty this box
                </button>
                <button
                    type="button"
                    class="btn"
                    :disabled="!selected || selected === currentImageId"
                    @click="confirm"
                >
                    Place image
                </button>
            </div>
        </div>
    </GameModal>
</template>
