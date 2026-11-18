import { onBeforeUnmount } from 'vue';
import type { Ref } from 'vue';

const EDGE = 70;
const SPEED = 14;
/** Passing through an edge band on the way somewhere should not scroll; resting in it should. */
const DWELL_MS = 250;

/**
 * While dragging, scroll the page up when the pointer hovers just below a sticky header
 * (the browser's own top edge is hidden behind it), and down near the bottom of the window.
 * Scrolling only starts once the pointer has rested in a band for a moment.
 */
export function useStickyEdgeScroll(header: Ref<HTMLElement | null>) {
    let pointerY: number | null = null;
    let frame = 0;
    let bandEnteredAt: number | null = null;

    function onPointerMove(event: PointerEvent | TouchEvent): void {
        pointerY =
            'touches' in event
                ? (event.touches[0]?.clientY ?? null)
                : event.clientY;
    }

    function scrollDirection(): -1 | 0 | 1 {
        if (pointerY === null) {
            return 0;
        }

        const headerBottom = header.value?.getBoundingClientRect().bottom ?? 0;

        if (pointerY > headerBottom && pointerY < headerBottom + EDGE) {
            return -1;
        }

        return pointerY > window.innerHeight - EDGE ? 1 : 0;
    }

    function tick(): void {
        if (pointerY !== null) {
            const headerBottom =
                header.value?.getBoundingClientRect().bottom ?? 0;

            if (pointerY > headerBottom && pointerY < headerBottom + EDGE) {
                window.scrollBy(0, -SPEED);
            } else if (pointerY > window.innerHeight - EDGE) {
                window.scrollBy(0, SPEED);
            }
        }

        frame = requestAnimationFrame(tick);
    }

    function start(): void {
        stop();
        document.addEventListener('pointermove', onPointerMove);
        document.addEventListener('touchmove', onPointerMove, {
            passive: true,
        });
        frame = requestAnimationFrame(tick);
    }

    function stop(): void {
        pointerY = null;
        bandEnteredAt = null;
        cancelAnimationFrame(frame);
        document.removeEventListener('pointermove', onPointerMove);
        document.removeEventListener('touchmove', onPointerMove);
    }

    onBeforeUnmount(stop);

    return { start, stop };
}
