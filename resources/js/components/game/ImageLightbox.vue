<script setup lang="ts">
import GameModal from '@/components/game/GameModal.vue';
import type { GameImage } from '@/types';

defineProps<{ image: GameImage | null }>();

const emit = defineEmits<{ close: [] }>();
</script>

<template>
    <GameModal
        :open="image !== null"
        label="Image preview"
        panel-class="max-w-[1300px] bg-white p-4"
        @close="emit('close')"
    >
        <img
            v-if="image"
            :src="image.url"
            :alt="`Image ${image.id}`"
            class="block h-auto w-full rounded-lg"
        />
    </GameModal>
</template>
