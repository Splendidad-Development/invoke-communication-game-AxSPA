<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import GameLayout from '@/layouts/GameLayout.vue';
import { store } from '@/routes/players';
</script>

<template>
    <Head title="Communication game" />
    <GameLayout>
        <section
            class="flex min-h-screen flex-col items-center justify-end px-5 pt-8 pb-[12vh] text-center"
            aria-labelledby="welcome-title"
        >
            <h1
                id="welcome-title"
                class="brush m-0 text-[clamp(2.6rem,8vw,6rem)]"
            >
                Communication game
            </h1>
            <p
                class="mt-[1.1rem] mb-8 text-[clamp(1rem,2.2vw,1.3rem)] font-semibold [text-shadow:0_2px_12px_rgb(0_0_0/.6)]"
            >
                Build the axSpA brand story, then hear how it sounds.
            </p>

            <Form
                v-bind="store.form()"
                autocomplete="off"
                class="w-full max-w-[520px]"
                #default="{ errors, processing }"
            >
                <div
                    class="flex gap-2.5 rounded-full bg-night/70 p-2 shadow-[0_10px_40px_rgb(0_0_0/.4)] backdrop-blur-md focus-within:shadow-[0_0_0_3px_var(--color-gold),0_10px_40px_rgb(0_0_0/.4)]"
                >
                    <label for="player-name" class="sr-only">Your name</label>
                    <input
                        id="player-name"
                        v-focus
                        name="name"
                        maxlength="40"
                        placeholder="Enter your name"
                        required
                        class="min-w-0 flex-1 bg-transparent px-[1.1rem] py-2.5 text-[1.05rem] font-semibold text-cream placeholder:text-muted focus:outline-none"
                    />
                    <button class="btn" type="submit" :disabled="processing">
                        Start
                    </button>
                </div>
                <p v-if="errors.name" class="mt-3 font-semibold text-bad">
                    {{ errors.name }}
                </p>
            </Form>
        </section>
    </GameLayout>
</template>
