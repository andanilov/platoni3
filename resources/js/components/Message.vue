<template>
    <div class="p-4 m-2 rounded-lg "
    :class="{
        'bg-rose-100 text-red-700' : type === 'error',
        'bg-amber-100 text-stone-700' : type === 'info',
        'bg-slate-50 text-stone-700' : type === 'text',
    }">
        <p class="text-[1.2em] font-bold">{{ title }}</p>
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
