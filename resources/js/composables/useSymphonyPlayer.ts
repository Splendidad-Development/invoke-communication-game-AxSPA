import { readonly, ref } from 'vue';
import { performSymphony } from '@/lib/symphony';
import type { SymphonyPerformance } from '@/lib/symphony';

const playingKey = ref<string | null>(null);
const currentStep = ref(-1);
let performance: SymphonyPerformance | null = null;

/**
 * One shared player for the whole game, so starting a symphony anywhere stops the one already playing.
 * `key` identifies who is playing (the result dialog, a leaderboard row) so each can show its own state.
 */
export function useSymphonyPlayer() {
    function stop(): void {
        performance?.stop();
    }

    function play(key: string, notes: boolean[]): void {
        stop();
        playingKey.value = key;
        currentStep.value = -1;

        const current = performSymphony(notes, {
            onStep: (index) => {
                currentStep.value = index;
            },
            onEnd: () => {
                if (performance === current) {
                    performance = null;
                    playingKey.value = null;
                    currentStep.value = -1;
                }
            },
        });

        performance = current;
    }

    function toggle(key: string, notes: boolean[]): void {
        if (playingKey.value === key) {
            stop();

            return;
        }

        play(key, notes);
    }

    return {
        playingKey: readonly(playingKey),
        currentStep: readonly(currentStep),
        play,
        stop,
        toggle,
    };
}
