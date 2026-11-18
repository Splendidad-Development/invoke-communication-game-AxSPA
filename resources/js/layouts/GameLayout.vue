<script setup lang="ts">
import LeaderboardButton from '@/components/game/LeaderboardButton.vue';
import LeaderboardModal from '@/components/game/LeaderboardModal.vue';

withDefaults(
    defineProps<{
        /** Blur the backdrop and hide the floating leaderboard button (the board has its own). */
        focused?: boolean;
    }>(),
    { focused: false },
);
</script>

<template>
    <div
        class="relative min-h-screen bg-night font-sans text-cream antialiased"
    >
        <div class="fixed inset-0 -z-0 overflow-hidden" aria-hidden="true">
            <div
                class="absolute inset-0 bg-[url('/images/game/background.jpg')] bg-cover bg-center"
                :class="focused && 'scale-105 blur-[10px] saturate-110'"
            />
            <div
                class="absolute inset-0"
                :class="
                    focused
                        ? 'bg-night/78'
                        : 'bg-linear-to-b from-night/35 via-night/70 via-55% to-night/95'
                "
            />
        </div>

        <LeaderboardButton
            v-if="!focused"
            class="fixed top-[calc(env(safe-area-inset-top,0px)+16px)] right-4 z-40 bg-night/80 backdrop-blur-md"
        />

        <div class="relative">
            <slot />
        </div>

        <LeaderboardModal />
    </div>
</template>
