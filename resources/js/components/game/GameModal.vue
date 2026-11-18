<script setup lang="ts">
import { nextTick, onBeforeUnmount, onMounted, ref, watch } from 'vue';
import { cn } from '@/lib/utils';

const props = withDefaults(
    defineProps<{
        open: boolean;
        label?: string;
        labelledby?: string;
        panelClass?: string;
        showClose?: boolean;
    }>(),
    {
        label: undefined,
        labelledby: undefined,
        panelClass: '',
        showClose: true,
    },
);

const emit = defineEmits<{ close: [] }>();

const panel = ref<HTMLElement | null>(null);
let previouslyFocused: HTMLElement | null = null;

/**
 * The dialog only renders in the browser. Lifecycle hooks don't run during SSR, so the server and the
 * hydrating client both render a plain placeholder (no Teleport), and the DOM is only touched once mounted.
 */
const isMounted = ref(false);

function onKeydown(event: KeyboardEvent): void {
    if (event.key === 'Escape') {
        emit('close');
    }
}

async function activate(): Promise<void> {
    previouslyFocused = document.activeElement as HTMLElement | null;
    document.addEventListener('keydown', onKeydown);
    await nextTick();
    panel.value
        ?.querySelector<HTMLElement>('[data-autofocus], button')
        ?.focus({ preventScroll: true });
}

function deactivate(): void {
    document.removeEventListener('keydown', onKeydown);
    previouslyFocused?.focus?.({ preventScroll: true });
    previouslyFocused = null;
}

onMounted(() => {
    isMounted.value = true;

    if (props.open) {
        void activate();
    }
});

watch(
    () => props.open,
    (isOpen) => (isOpen ? void activate() : deactivate()),
);

onBeforeUnmount(() => document.removeEventListener('keydown', onKeydown));
</script>

<template>
    <Teleport v-if="isMounted" to="body">
        <div
            v-if="open"
            class="fixed inset-0 z-100 flex items-center justify-center bg-[rgb(10_10_24/.72)] p-4 backdrop-blur-md"
            role="dialog"
            aria-modal="true"
            :aria-label="label"
            :aria-labelledby="labelledby"
            @click.self="emit('close')"
        >
            <div
                ref="panel"
                :class="
                    cn(
                        'relative max-h-[94vh] w-full max-w-[1100px] overflow-auto rounded-[20px] bg-panel-solid p-6 text-cream shadow-[0_30px_90px_rgb(0_0_0/.6)]',
                        panelClass,
                    )
                "
            >
                <button
                    v-if="showClose"
                    type="button"
                    class="absolute top-3.5 right-3.5 z-10 size-[38px] cursor-pointer rounded-full bg-white/10 text-xl text-white hover:bg-gold hover:text-ink"
                    aria-label="Close"
                    @click="emit('close')"
                >
                    ×
                </button>
                <slot />
            </div>
        </div>
    </Teleport>
</template>
