<template>

     <button class="rounded-xl shadow-sm border-2 m-2 aspect-square text-xl w-[2em]"
     @click="press">
        <slot/>
    </button>

</template>

<script setup>
const props = defineProps({ press: Function })
</script>
