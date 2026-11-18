<script setup lang="ts">
import { colourKey, sectionToneClasses } from '@/lib/game';
</script>

<template>
    <div
        class="flex w-fit max-w-full flex-wrap items-center gap-x-6 gap-y-1.5 rounded-[4px_18px_4px_18px] bg-gold/92 px-5 py-2.5 text-[.85rem] font-semibold text-ink"
        aria-label="Colour key"
    >
        <b class="mr-1 font-display text-xl font-normal">Key</b>
        <span
            v-for="item in colourKey"
            :key="item.tone"
            class="inline-flex items-center"
        >
            <i
                class="skewed mr-1.5 inline-block h-4 w-7 rounded-[3px] shadow-[inset_0_0_0_1px_rgb(0_0_0/.25)]"
                :class="sectionToneClasses[item.tone]"
            />
            {{ item.label }}
        </span>
    </div>
</template>
