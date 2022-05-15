<template>
    <div class="fixed inset-0 backdrop-blur-[3px] bg-white/10 flex flex-col justify-center items-center"
    :style="`z-index:${zIndex ? zIndex : 10}`"></div>
</template>

<script setup>
const props = defineProps({ zIndex : String })
</script>
