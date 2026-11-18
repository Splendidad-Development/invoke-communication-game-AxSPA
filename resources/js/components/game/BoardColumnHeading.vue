<script setup lang="ts">
import type { BoardColumn } from '@/types';

defineProps<{ column: BoardColumn }>();
</script>

<template>
    <div
        v-if="column.tone === 'how'"
        class="grid min-h-24 w-full place-items-center rounded-[14px] bg-[linear-gradient(147deg,#ffd21f_0%,#e9a92a_71%)] p-3 text-center text-[19px] font-extrabold text-ink"
    >
        {{ column.title }}
    </div>
    <div
        v-else
        class="flex w-full flex-col items-center gap-1 rounded-[14px] p-3 text-center text-[13px] font-semibold"
        :class="
            column.tone === 'unmet'
                ? 'bg-[linear-gradient(140deg,#7fb2da_0%,#b9d9ee_71%)] text-ink'
                : 'bg-[linear-gradient(168deg,#4f9b86_0%,#79c7ae_71%)] text-white'
        "
    >
        <h3 class="m-0 text-lg font-extrabold">{{ column.title }}</h3>
        {{ column.description }}
    </div>
</template>
