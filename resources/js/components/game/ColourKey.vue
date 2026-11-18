<script setup lang="ts">
import { colourKey, sectionToneClasses } from '@/lib/game';
</script>

<template>
    <div
        class="flex w-fit max-w-full flex-wrap items-center gap-x-[22px] gap-y-1.5 rounded-[4px_18px_4px_18px] bg-gold/92 px-5 py-2.5 text-[13px] font-semibold text-ink"
        aria-label="Colour key"
    >
        <b class="font-display text-xl leading-normal font-normal">Key</b>
        <span
            v-for="item in colourKey"
            :key="item.tone"
            class="inline-flex items-center gap-2"
        >
            <i
                class="inline-block h-4 w-7 rounded-[3px] border border-black/25"
                :class="sectionToneClasses[item.tone]"
            />
            {{ item.label }}
        </span>
    </div>
</template>
