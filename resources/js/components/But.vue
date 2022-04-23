<template>

<button class="my-3 rounded-lg pt-3 pb-2 px-5 text-[1.1em] uppercase tracking-widest shadow-sm hover:shadow-none text-white"
:class="{
    'bg-gradient-to-tr from-lime-500  to-lime-400  shadow-lime-500/50' : type === 'ok',
    'bg-gradient-to-tr from-stone-200  to-stone-50 text-black shadow-gray-500/50' : type === 'info',
    'bg-gradient-to-tr from-amber-500  to-amber-400  shadow-amber-500/50 ' : type === 'warning',
}">
    <slot/>
</button>

</template>

<script setup>
const props = defineProps({ type: String })
</script>
