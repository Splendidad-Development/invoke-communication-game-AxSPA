<script setup lang="ts">
import GameModal from '@/components/game/GameModal.vue';
import type { GameImage, Mistake } from '@/types';

defineProps<{
    open: boolean;
    mistakes: Mistake[];
    images: Map<number, GameImage>;
}>();

const emit = defineEmits<{
    close: [];
    zoom: [image: GameImage];
}>();
</script>

<template>
    <GameModal
        :open="open"
        labelledby="mistakes-title"
        panel-class="flex max-w-[780px] flex-col gap-3.5 px-[26px] pt-6 pb-[22px]"
        @close="emit('close')"
    >
        <div class="mr-12 flex items-center gap-3">
            <h2
                id="mistakes-title"
                class="m-0 font-display text-[34px] font-normal text-gold"
            >
                Wrong answers
            </h2>
            <span class="text-sm font-medium text-muted">
                {{ mistakes.length }}
                {{ mistakes.length === 1 ? 'image' : 'images' }} in the wrong
                box
            </span>
        </div>

        <ol class="m-0 max-h-[64vh] list-none overflow-auto p-0">
            <li
                v-for="(mistake, index) in mistakes"
                :key="mistake.slotId"
                class="flex items-center gap-4 border-b border-white/6 px-2 py-2.5"
            >
                <span
                    class="w-7 shrink-0 font-display text-[22px] text-muted"
                    aria-hidden="true"
                >
                    {{ index + 1 }}
                </span>
                <button
                    v-if="mistake.imageId && images.get(mistake.imageId)"
                    type="button"
                    class="h-[69px] w-[92px] shrink-0 cursor-zoom-in rounded-[7px] border-4 border-bad bg-white bg-cover bg-center"
                    :style="{
                        backgroundImage: `url(${images.get(mistake.imageId)!.url})`,
                    }"
                    :aria-label="`Enlarge image ${mistake.imageId}`"
                    @click="emit('zoom', images.get(mistake.imageId)!)"
                />
                <div class="flex min-w-0 flex-col gap-1 text-[15px]">
                    <p class="m-0 text-muted">
                        You put it in
                        <b class="font-bold text-bad">{{ mistake.placedIn }}</b>
                    </p>
                    <p v-if="mistake.belongsIn" class="m-0 text-muted">
                        It belongs in
                        <b class="font-bold text-ok">{{ mistake.belongsIn }}</b>
                    </p>
                </div>
            </li>
        </ol>
    </GameModal>
</template>
