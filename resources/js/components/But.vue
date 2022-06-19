<template>

<button class="m-[1vh] rounded-lg shadow-sm uppercase text-white
py-[1vh] text-[3vh] tracking-widest"
:class="{
    'bg-gradient-to-tr from-lime-500  to-lime-400  shadow-lime-500/50' : type === 'ok',
    'bg-gradient-to-tr from-stone-200  to-stone-50 text-black shadow-gray-500/50' : type === 'info',
    'bg-gradient-to-tr from-amber-500  to-amber-400  shadow-amber-500/50 ' : type === 'warning',
    'bg-gradient-to-tr from-red-500  to-red-400  shadow-red-500/50 ' : type === 'error',
}">
    <slot/>
</button>

</template>

<script setup>
const props = defineProps({ type: String })
</script>
