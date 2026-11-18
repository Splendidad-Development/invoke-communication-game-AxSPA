<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import GameLayout from '@/layouts/GameLayout.vue';
import { store } from '@/routes/answers';
import { groups } from '@/routes/game';
import type { Group, Player } from '@/types';

defineProps<{
    player: Player;
    group: Group;
}>();

const answer = ref('');
</script>

<template>
    <Head :title="`Group ${group.number}`" />
    <GameLayout>
        <section
            class="flex min-h-screen flex-col items-center justify-center px-5 py-8"
        >
            <Form
                v-bind="store.form(group.number)"
                class="w-full max-w-[760px] rounded-[22px] bg-panel p-[clamp(1.4rem,4vw,2.4rem)] shadow-[0_20px_60px_rgb(0_0_0/.45)] backdrop-blur-xl"
                #default="{ errors, processing }"
            >
                <div
                    class="mb-6 -skew-x-3 rounded-[6px_22px_6px_22px] bg-gold px-5 py-4 text-[1.05rem] leading-[1.45] text-ink"
                >
                    <div class="skew-x-3">
                        <span class="mb-0.5 block font-display text-[1.3rem]">
                            Group {{ group.number }}
                        </span>
                        {{ group.persona }}
                    </div>
                </div>

                <label
                    for="answer"
                    class="mb-4 block text-[clamp(1.15rem,2.4vw,1.4rem)] leading-[1.4] font-bold"
                >
                    {{ group.question }}
                </label>
                <textarea
                    id="answer"
                    v-model="answer"
                    v-focus
                    name="body"
                    placeholder="Type your answer here"
                    class="min-h-[170px] w-full resize-y rounded-[14px] border-2 border-white/18 bg-black/28 px-[1.1rem] py-4 text-base leading-[1.55] font-medium text-cream focus:border-gold focus:outline-none"
                />
                <p v-if="errors.body" class="mt-2 font-semibold text-bad">
                    {{ errors.body }}
                </p>

                <div
                    class="mt-5 flex flex-wrap items-center justify-between gap-4"
                >
                    <Link :href="groups()" class="btn-ghost">Change group</Link>
                    <span v-if="!answer.trim()" class="text-sm text-muted">
                        Write your answer to continue
                    </span>
                    <button
                        class="btn"
                        type="submit"
                        :disabled="!answer.trim() || processing"
                    >
                        Continue to the board
                    </button>
                </div>
            </Form>
        </section>
    </GameLayout>
</template>
