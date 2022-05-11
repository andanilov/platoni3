<template>

    <div class="dropdown-wrapper relative inline-block float-right z-50 top-navi"
    :class="{'selected' : currentRoute === '/Profile'}">
        <div class=" flex justify-end gap-1 items-center">
            <span class=" inline-block text-[.6em] text-stone-400">&#9660;</span>
            <a class="dropdown-but text-ellipsis overflow-hidden max-w-[5em] inline-block" href="#">{{ title }}</a>
        </div>

        <div class=" dropdown-body absolute w-min bg-grey shadow-md py-4 px-5 bg-white z-50"
            :class="side + '-0'"
        >
            <slot/>
        </div>
    </div>

</template>

<script setup>
const props = defineProps({
    title: String,
    side: String
})

const currentRoute = document.location.pathname
</script>

<style>
.dropdown-wrapper:hover .dropdown-body { display: block; }
</style>
