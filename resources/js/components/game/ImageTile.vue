<script setup lang="ts">
import ZoomIcon from '@/components/game/ZoomIcon.vue';
import type { GameImage } from '@/types';

defineProps<{
    image: GameImage;
    /** Fill the parent slot; tiles in a slot stack, so a drop preview never changes the layout. */
    fill?: boolean;
}>();

const emit = defineEmits<{ zoom: [image: GameImage] }>();
</script>

<template>
    <div
        class="tile group shrink-0 cursor-grab touch-manipulation overflow-hidden bg-white bg-cover bg-center bg-no-repeat select-none"
        :class="
            fill
                ? 'absolute inset-0 size-full rounded-[5px]'
                : 'relative h-24 w-32 rounded-lg shadow-[0_4px_14px_rgb(0_0_0/.4)]'
        "
        :style="{ backgroundImage: `url(${image.url})` }"
        :data-image="image.id"
    >
        <button
            type="button"
            class="zoom-button"
            aria-label="Enlarge image"
            @click.stop="emit('zoom', image)"
        >
            <ZoomIcon class="size-[15px]" />
        </button>
    </div>
</template>
