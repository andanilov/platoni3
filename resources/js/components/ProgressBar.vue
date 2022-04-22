<template>

    <div class=" relative flex w-full justify-between">

        <div class="z-10 bg-lime-500 text-white rounded-full px-2 mb-1 text-[.9em]">
            {{ passed }}
        </div>

        <progress-line class="z-1 absolute left-2 right-2 h-3 top-[19%]"
        :progress="progress"/>

        <div class="z-10 float-right bg-neutral-100 text-neutral-500 rounded-full px-2 mb-1 text-[.9em]">
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
