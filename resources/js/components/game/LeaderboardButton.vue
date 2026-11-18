<script setup lang="ts">
import TrophyIcon from '@/components/game/TrophyIcon.vue';
import { useLeaderboard } from '@/composables/useLeaderboard';
import { cn } from '@/lib/utils';

defineProps<{ class?: string }>();

const leaderboard = useLeaderboard();
</script>

<template>
    <button
        type="button"
        :class="
            cn(
                'inline-flex cursor-pointer items-center gap-2 rounded-full bg-white/8 px-4 py-2 text-sm font-bold text-cream shadow-[inset_0_0_0_1.5px_rgb(255_210_31/.55)] hover:bg-gold hover:text-ink',
                $props.class,
            )
        "
        @click="leaderboard.open()"
    >
        <TrophyIcon class="size-[17px]" />
        <span>Leaderboard</span>
    </button>
</template>
