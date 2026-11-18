<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import GameLayout from '@/layouts/GameLayout.vue';
import { create } from '@/routes/answers';
import type { Player } from '@/types';

defineProps<{
    player: Player;
    groups: number[];
}>();
</script>

<template>
    <Head title="Choose your group" />
    <GameLayout>
        <section
            class="flex min-h-screen flex-col items-center justify-center px-5 py-8"
            aria-labelledby="groups-title"
        >
            <h1
                id="groups-title"
                class="m-0 mb-1.5 text-center font-display text-[clamp(2rem,5vw,3.4rem)] font-normal text-gold [text-shadow:0_3px_20px_rgb(0_0_0/.6)]"
            >
                Hi {{ player.name }}
            </h1>
            <p
                class="mb-9 text-center text-lg [text-shadow:0_2px_10px_rgb(0_0_0/.7)]"
            >
                Choose your group
            </p>

            <div
                class="grid w-full max-w-80 grid-cols-1 justify-center gap-5 sm:max-w-none sm:grid-cols-[repeat(3,minmax(0,220px))]"
            >
                <Link
                    v-for="group in groups"
                    :key="group"
                    :href="create(group)"
                    class="flex items-center justify-center gap-4 rounded-[18px] bg-panel px-4 py-4 text-cream shadow-[inset_0_0_0_1px_rgb(255_210_31/.25),0_14px_40px_rgb(0_0_0/.35)] backdrop-blur-[10px] transition hover:-translate-y-1 hover:bg-[rgb(40_36_60/.85)] hover:shadow-[inset_0_0_0_2px_var(--color-gold),0_18px_50px_rgb(0_0_0/.45)] sm:flex-col sm:gap-1.5 sm:pt-6 sm:pb-5"
                >
                    <span
                        class="font-display text-[2.6rem] leading-none text-gold sm:text-[4rem]"
                    >
                        {{ group }}
                    </span>
                    <span class="text-lg font-bold">Group {{ group }}</span>
                </Link>
            </div>
        </section>
    </GameLayout>
</template>
