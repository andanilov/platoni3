<template>
    <div class="rounded-sm text-center py-4 sm:py-8 lg:py-12"
    :style="{
        background : bgColor,
        color : color,
    }"
    >
        <span class="block text-[2em] leading-[1.5em]">{{ title }}</span>
        <span class="block text-[.8em] leading-[1em] px-2">{{ description }}</span>
    </div>
</template>

<script setup>
const props = defineProps({
    bgColor:    { type: String, default: '#a8a29e' },
    color:      { type: String, default: '#fafaf9' },
    title:      { type: String, default: '' },
    description:{ type: String, default: '' },
})
</script>
