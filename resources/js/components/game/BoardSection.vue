<script setup lang="ts">
import BoardSlot from '@/components/game/BoardSlot.vue';
import { sectionToneClasses } from '@/lib/game';
import type { BoardSection, GameImage } from '@/types';

defineProps<{
    section: BoardSection;
    lists: Record<string, number[]>;
    images: Map<number, GameImage>;
    locked: boolean;
    correctness: (slotId: string) => boolean | null;
    playingSlotId: string | null;
    targetSlotId?: string | null;
    /** Section titles are the answers, so they only show once the board is scored. */
    showLabel: boolean;
}>();

const emit = defineEmits<{
    'update:list': [slotId: string, list: number[]];
    dropped: [slotId: string, imageId: number, fromList: string];
    dragStart: [];
    dragEnd: [];
    open: [slotId: string];
    zoom: [image: GameImage];
}>();
</script>

<template>
    <div class="flex w-full flex-col items-center gap-[7px]">
        <div
            v-if="showLabel"
            class="max-w-full rounded-xs px-2.5 py-1 text-center text-[13px] font-bold text-ink"
            :class="sectionToneClasses[section.tone]"
        >
            {{ section.title }}
        </div>
        <div class="flex flex-wrap justify-center gap-2">
            <BoardSlot
                v-for="slotId in section.slots"
                :key="slotId"
                :model-value="lists[slotId]"
                :slot-id="slotId"
                :label="section.title"
                :images="images"
                :locked="locked"
                :is-correct="correctness(slotId)"
                :is-playing="playingSlotId === slotId"
                :is-target="targetSlotId === slotId"
                @update:model-value="emit('update:list', slotId, $event)"
                @dropped="(...args) => emit('dropped', ...args)"
                @drag-start="emit('dragStart')"
                @drag-end="emit('dragEnd')"
                @open="emit('open', $event)"
                @zoom="emit('zoom', $event)"
            />
        </div>
    </div>
</template>
