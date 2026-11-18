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
    <div class="flex w-full flex-col items-center gap-2">
        <div
            class="max-w-full rounded-xs px-3 py-1 text-center text-[.8rem] leading-[1.25] font-bold text-ink"
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
