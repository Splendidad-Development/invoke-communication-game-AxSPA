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
                'inline-flex shrink-0 cursor-pointer items-center gap-2 rounded-full bg-white/8 px-4 py-[9px] text-sm font-bold text-cream shadow-[inset_0_0_0_1.5px_rgb(255_210_31/.55)] hover:bg-gold hover:text-ink',
                $props.class,
                leaderboard.isOpen.value && 'bg-gold text-ink',
            )
        "
        :aria-expanded="leaderboard.isOpen.value"
        @click="leaderboard.open()"
    >
        <TrophyIcon class="size-[18px]" />
        <span>Leaderboard</span>
    </button>
</template>
