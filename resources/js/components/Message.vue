<template>
    <div class="m-2 rounded-lg tracking-wide border-l-8
    text-[1em] sm:text-[.7em]
    p-4 sm:p-8 "
    :class="{
        'bg-rose-100 text-red-700' : type === 'error',
        'bg-amber-100 text-stone-700 border-amber-200' : type === 'info',
        'bg-slate-50 text-stone-700' : type === 'text',
    }">
        <p class="font-bold pb-[.6em] text-[1.2em]">{{ title }}</p>
        <p class="text-[0.8em]">
            <slot/>
        </p>
    </div>
</template>

<script setup>
const props = defineProps({
    type : {type: String, default : 'text'},
    title: String
})
</script>
