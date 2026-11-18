import { router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const isOpen = ref(false);
const isLoading = ref(false);

/**
 * Shared open/close state for the leaderboard dialog. Scores are loaded with a partial reload of the
 * optional `leaderboard` prop, so they are only queried when someone opens the dialog.
 */
export function useLeaderboard() {
    const page = usePage();
    const entries = computed(() => page.props.leaderboard ?? null);

    function refresh(): void {
        router.reload({
            only: ['leaderboard'],
            onStart: () => {
                isLoading.value = true;
            },
            onFinish: () => {
                isLoading.value = false;
            },
        });
    }

    function open(): void {
        isOpen.value = true;
        refresh();
    }

    function close(): void {
        isOpen.value = false;
    }

    return { isOpen, isLoading, entries, open, close, refresh };
}
