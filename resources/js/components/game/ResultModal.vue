<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import GameModal from '@/components/game/GameModal.vue';
import PlayIcon from '@/components/game/PlayIcon.vue';
import SymphonyNotes from '@/components/game/SymphonyNotes.vue';
import TrophyIcon from '@/components/game/TrophyIcon.vue';
import { useLeaderboard } from '@/composables/useLeaderboard';
import { useSymphonyPlayer } from '@/composables/useSymphonyPlayer';
import { RESULT_PLAYER_KEY, verdictFor } from '@/lib/game';
import { patternToNotes } from '@/lib/symphony';
import { show as boardShow } from '@/routes/board';
import { groups } from '@/routes/game';
import type { ArrangementResult } from '@/types';

const props = defineProps<{
    open: boolean;
    result: ArrangementResult;
    playerName: string;
    answerId: number;
}>();

const emit = defineEmits<{ close: [] }>();

const player = useSymphonyPlayer();
const leaderboard = useLeaderboard();

const notes = computed(() => patternToNotes(props.result.pattern));
const isPlaying = computed(() => player.playingKey.value === RESULT_PLAYER_KEY);
const hasPlayed = computed(
    () => isPlaying.value || player.currentStep.value >= 0,
);

function close(): void {
    player.stop();
    emit('close');
}

function openLeaderboard(): void {
    close();
    leaderboard.open();
}
</script>

<template>
    <GameModal
        :open="open"
        labelledby="result-score"
        :show-close="false"
        panel-class="max-w-[620px] bg-[radial-gradient(120%_90%_at_50%_0%,#3a2c3f_0%,var(--color-panel-solid)_60%)] px-6 py-8 text-center"
        @close="close"
    >
        <div
            id="result-score"
            class="mt-1.5 mb-1 font-display text-[clamp(4rem,14vw,7rem)] leading-none text-gold"
        >
            {{ result.score
            }}<small class="text-[.45em] text-cream">/{{ notes.length }}</small>
        </div>
        <p class="mb-6 text-lg font-semibold">
            {{ verdictFor(result.score, notes.length, playerName) }}
        </p>

        <SymphonyNotes
            :notes="notes"
            size="large"
            reveal-as-played
            :active-index="
                isPlaying
                    ? player.currentStep.value
                    : hasPlayed
                      ? notes.length
                      : -1
            "
        />

        <button
            type="button"
            class="btn px-8 py-4 text-lg"
            data-autofocus
            @click="player.toggle(RESULT_PLAYER_KEY, notes)"
        >
            <PlayIcon class="size-5" :playing="isPlaying" />
            <span>{{ isPlaying ? 'Stop' : 'Play your arrangement' }}</span>
        </button>

        <div class="mt-5 flex flex-wrap justify-center gap-3">
            <button type="button" class="btn-ghost" @click="close">
                Review board
            </button>
            <Link
                :href="boardShow(answerId)"
                class="btn-ghost"
                @click="player.stop()"
            >
                Try again
            </Link>
            <Link :href="groups()" class="btn-ghost" @click="player.stop()">
                Back to groups
            </Link>
            <button type="button" class="btn-ghost" @click="openLeaderboard">
                <TrophyIcon class="size-[17px]" />
                Leaderboard
            </button>
        </div>
    </GameModal>
</template>
