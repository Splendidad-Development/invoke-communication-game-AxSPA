<script setup lang="ts">
defineProps<{ playing?: boolean }>();
</script>

<template>
    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <template v-if="playing">
            <rect x="6" y="5" width="4.5" height="14" rx="1" />
            <rect x="13.5" y="5" width="4.5" height="14" rx="1" />
        </template>
        <path v-else d="M7 4.5v15l13-7.5z" />
    </svg>
</template>
