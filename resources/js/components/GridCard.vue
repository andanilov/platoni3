<template>
    <div class="grid-card-item rounded-lg text-center py-4 sm:py-8 lg:py-12 flex justify-end items-center"
    :style="{
        background : bgColor,
        color : color,
        backgroundImage : img ? ` url(${img})` : 'none',
    }"
    >
        <div class="text-right tracking-normal">
            <span class="block
            pr-[.3em] sm:pr-[.3em]
            text-[1.7em] sm:text-[2em]
            leading-[0.8em] sm:leading-[0.9em]">
                {{ title }}
            </span>
            <span class="block pl-[.1em]
            text-[.7em] sm:text-[.8em]
            pr-[.8em] sm:pr-[1em]"
            :style="{ background : bgColor }">{{ description }}</span>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    bgColor:    { type: String, default: '#a8a29e' },
    color:      { type: String, default: '#fafaf9' },
    title:      { type: String, default: '' },
    description:{ type: String, default: '' },
    img:        { type: String, default: '' },
})
</script>

<style scoped>
.grid-card-item {
    background-repeat: no-repeat !important;
    background-size: contain !important;
    background-position: left !important;
    background-position-x: -1em !important;
}

/*@media (max-width: 639px) {
    .grid-card-item { background-position-x: -1em !important; }
}
@media (min-width: 640px) and (max-width: 1023px) {
    .grid-card-item { background-position-x: -1em !important; }
}
@media (min-width: 1024px) {
    .grid-card-item { background-position-x: -3em !important; }
} */
</style>
