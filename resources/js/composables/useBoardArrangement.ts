import { computed, reactive, ref } from 'vue';
import { shuffle } from '@/lib/game';

export const TRAY = 'tray';

/**
 * The state of the board: one list for the tray of unplaced images, and one list (of at most one image)
 * per slot. The lists are bound to the drag-and-drop containers, so they are the single source of truth.
 */
export function useBoardArrangement(slotIds: string[], imageIds: number[]) {
    const order = ref<number[]>([]);
    const lists = reactive<Record<string, number[]>>({});

    function reset(placements: Record<string, number> | null = null): void {
        order.value = shuffle(imageIds);

        const placed = new Set(Object.values(placements ?? {}));
        lists[TRAY] = order.value.filter((imageId) => !placed.has(imageId));
        slotIds.forEach((slotId) => {
            lists[slotId] = placements?.[slotId] ? [placements[slotId]] : [];
        });
    }

    const placements = computed<Record<string, number>>(() =>
        Object.fromEntries(
            slotIds
                .filter((slotId) => lists[slotId]?.length)
                .map((slotId) => [slotId, lists[slotId][0]]),
        ),
    );

    const placedCount = computed(() => Object.keys(placements.value).length);

    const isComplete = computed(() => placedCount.value === slotIds.length);

    function slotOf(imageId: number): string | null {
        return slotIds.find((slotId) => lists[slotId]?.[0] === imageId) ?? null;
    }

    function removeFromTray(imageId: number): void {
        lists[TRAY] = lists[TRAY].filter((id) => id !== imageId);
    }

    /**
     * Put an image in a slot. If the slot is taken, the images swap places
     * (or the displaced image goes back to the tray when the new one came from there).
     */
    function place(imageId: number, slotId: string): void {
        const fromSlot = slotOf(imageId);
        const displaced = lists[slotId][0];

        if (fromSlot === slotId) {
            return;
        }

        if (fromSlot) {
            lists[fromSlot] = displaced ? [displaced] : [];
        } else {
            removeFromTray(imageId);

            if (displaced) {
                lists[TRAY] = [...lists[TRAY], displaced];
            }
        }

        lists[slotId] = [imageId];
    }

    function clearSlot(slotId: string): void {
        const imageId = lists[slotId][0];

        if (imageId) {
            lists[slotId] = [];
            lists[TRAY] = [...lists[TRAY], imageId];
        }
    }

    /**
     * Called after an image is dropped into a slot that already held one. The library has added the
     * dropped image to the slot's list; this moves the image that was there to where the drag started.
     */
    function settleDrop(
        slotId: string,
        droppedImageId: number,
        fromList: string,
    ): void {
        const displaced = lists[slotId].filter((id) => id !== droppedImageId);

        if (!displaced.length) {
            return;
        }

        lists[slotId] = [droppedImageId];

        if (fromList !== TRAY && lists[fromList]?.length === 0) {
            lists[fromList] = displaced;

            return;
        }

        lists[TRAY] = [...lists[TRAY], ...displaced];
    }

    return {
        order,
        lists,
        placements,
        placedCount,
        isComplete,
        reset,
        slotOf,
        place,
        clearSlot,
        settleDrop,
    };
}
