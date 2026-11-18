<script setup lang="ts">
import { computed, ref, watch } from 'vue';
import GameModal from '@/components/game/GameModal.vue';
import PlayIcon from '@/components/game/PlayIcon.vue';
import SymphonyNotes from '@/components/game/SymphonyNotes.vue';
import { useLeaderboard } from '@/composables/useLeaderboard';
import { useSymphonyPlayer } from '@/composables/useSymphonyPlayer';
import { patternToNotes } from '@/lib/symphony';

const leaderboard = useLeaderboard();
const player = useSymphonyPlayer();

const filters = [
    { value: 'all', label: 'All groups' },
    { value: '1', label: 'Group 1' },
    { value: '2', label: 'Group 2' },
    { value: '3', label: 'Group 3' },
] as const;

const filter = ref<(typeof filters)[number]['value']>('all');

const rows = computed(() =>
    (leaderboard.entries.value ?? []).filter(
        (entry) =>
            filter.value === 'all' || String(entry.group) === filter.value,
    ),
);

const summary = computed(() => {
    if (!rows.value.length) {
        return '';
    }

    const players = new Set(rows.value.map((entry) => entry.playerId)).size;
    const plays = rows.value.length;

    return `${players} ${players === 1 ? 'player' : 'players'} · ${plays} ${plays === 1 ? 'play' : 'plays'}`;
});

const playKey = (id: number): string => `leaderboard-${id}`;

function selectFilter(value: (typeof filters)[number]['value']): void {
    player.stop();
    filter.value = value;
}

function close(): void {
    player.stop();
    leaderboard.close();
}

watch(leaderboard.isOpen, (isOpen) => {
    if (!isOpen) {
        player.stop();
    }
});

const rankColour = (index: number): string =>
    ['text-gold', 'text-[#d9d9e3]', 'text-sunset'][index] ?? 'text-muted';
</script>

<template>
    <GameModal
        :open="leaderboard.isOpen.value"
        labelledby="leaderboard-title"
        panel-class="max-w-[720px] px-6 pt-6 pb-5"
        @close="close"
    >
        <div class="mr-10 mb-1 flex flex-wrap items-baseline gap-3">
            <h2
                id="leaderboard-title"
                class="m-0 font-display text-[2rem] font-normal text-gold"
            >
                Leaderboard
            </h2>
            <span class="text-sm text-muted">{{ summary }}</span>
        </div>

        <div
            class="mt-2.5 mb-4 inline-flex flex-wrap gap-1 rounded-full bg-white/7 p-1"
            role="group"
            aria-label="Filter by group"
        >
            <button
                v-for="option in filters"
                :key="option.value"
                type="button"
                class="cursor-pointer rounded-full px-3.5 py-1.5 text-[.82rem] font-bold"
                :class="
                    filter === option.value ? 'bg-gold text-ink' : 'text-cream'
                "
                :aria-pressed="filter === option.value"
                @click="selectFilter(option.value)"
            >
                {{ option.label }}
            </button>
        </div>

        <div class="max-h-[60vh] overflow-auto">
            <table v-if="rows.length" class="w-full border-collapse">
                <thead>
                    <tr
                        class="text-left text-xs tracking-[.06em] text-muted uppercase"
                    >
                        <th
                            class="border-b border-white/12 px-1.5 py-1.5 sm:px-2"
                        >
                            #
                        </th>
                        <th
                            class="border-b border-white/12 px-1.5 py-1.5 sm:px-2"
                        >
                            Name
                        </th>
                        <th
                            class="border-b border-white/12 px-1.5 py-1.5 sm:px-2"
                        >
                            Score
                        </th>
                        <th
                            class="border-b border-white/12 px-1.5 py-1.5 sm:px-2"
                        >
                            Symphony
                        </th>
                        <th
                            class="border-b border-white/12 px-1.5 py-1.5 sm:px-2"
                        >
                            <span class="sr-only">Play</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(entry, index) in rows"
                        :key="entry.id"
                        :class="entry.mine && 'bg-gold/8'"
                    >
                        <td
                            class="w-10 border-b border-white/6 px-1.5 py-2.5 font-display text-xl sm:px-2"
                            :class="rankColour(index)"
                        >
                            {{ index + 1 }}
                        </td>
                        <td
                            class="border-b border-white/6 px-1.5 py-2.5 font-bold sm:px-2"
                        >
                            {{ entry.name }}
                            <small
                                class="block text-[.78rem] font-medium text-muted"
                            >
                                Group {{ entry.group
                                }}<template v-if="entry.mine"> · you</template>
                            </small>
                        </td>
                        <td
                            class="border-b border-white/6 px-1.5 py-2.5 font-display text-[1.35rem] whitespace-nowrap text-gold sm:px-2"
                        >
                            {{ entry.score
                            }}<small class="text-[.7em] text-cream">/25</small>
                        </td>
                        <td
                            class="border-b border-white/6 px-1.5 py-2.5 sm:px-2"
                        >
                            <SymphonyNotes
                                :notes="patternToNotes(entry.pattern)"
                                :active-index="
                                    player.playingKey.value ===
                                    playKey(entry.id)
                                        ? player.currentStep.value
                                        : -1
                                "
                            />
                        </td>
                        <td
                            class="border-b border-white/6 px-1.5 py-2.5 sm:px-2"
                        >
                            <button
                                type="button"
                                class="grid size-[38px] cursor-pointer place-items-center rounded-full text-ink"
                                :class="
                                    player.playingKey.value ===
                                    playKey(entry.id)
                                        ? 'bg-white'
                                        : 'bg-gold'
                                "
                                :aria-pressed="
                                    player.playingKey.value ===
                                    playKey(entry.id)
                                "
                                :aria-label="`Play ${entry.name}’s arrangement`"
                                @click="
                                    player.toggle(
                                        playKey(entry.id),
                                        patternToNotes(entry.pattern),
                                    )
                                "
                            >
                                <PlayIcon
                                    class="size-[15px]"
                                    :playing="
                                        player.playingKey.value ===
                                        playKey(entry.id)
                                    "
                                />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-else class="px-4 py-8 text-center text-muted">
                {{
                    leaderboard.isLoading.value &&
                    leaderboard.entries.value === null
                        ? 'Loading scores…'
                        : 'No scores yet. Finish a board to be the first on the leaderboard.'
                }}
            </p>
        </div>

        <p class="mt-3 text-[.8rem] text-muted">
            Scores are shared with everyone playing the game.
        </p>
    </GameModal>
</template>
