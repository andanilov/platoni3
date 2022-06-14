<template>

    <div class="relative w-full flex items-center
    text-[.9em] sm:text-[.7em]">

        <div class="z-10 absolute left-0 flex items-center justify-center bg-lime-500 text-white rounded-full aspect-square
        w-[2.1em] sm:w-[1.8em]">
            {{ passed }}
        </div>

        <progress-line class="z-1 w-full mx-2
        h-4 sm:h-5"
        :progress="progress"/>

        <div class="z-10 absolute right-0 flex items-center justify-center bg-[rgb(225,225,225)] text-neutral-500 rounded-full aspect-square
        w-[2.1em] sm:w-[1.8em]">
            {{ left }}
        </div>

    </div>



</template>

<script setup>
import ProgressLine from '@/components/ProgressLine'

const props = defineProps({
    progress: Number,
    passed: Number,
    left: Number,
})
</script>
