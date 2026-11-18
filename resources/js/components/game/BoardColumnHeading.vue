<script setup lang="ts">
import type { BoardColumn } from '@/types';

defineProps<{ column: BoardColumn }>();
</script>

<template>
    <div
        v-if="column.tone === 'how'"
        class="grid min-h-24 w-full place-items-center rounded-[14px] bg-linear-160 from-gold to-gold-deep p-3 text-center text-lg font-extrabold text-ink"
    >
        {{ column.title }}
    </div>
    <div
        v-else
        class="w-full rounded-[14px] px-3 py-3 text-center text-[.86rem] leading-[1.3] font-semibold"
        :class="
            column.tone === 'unmet'
                ? 'bg-linear-160 from-[#7fb2da] to-[#b9d9ee] text-ink'
                : 'bg-linear-160 from-[#4f9b86] to-[#79c7ae] text-white'
        "
    >
        <h3 class="m-0 mb-1 text-lg font-extrabold">{{ column.title }}</h3>
        {{ column.description }}
    </div>
</template>
