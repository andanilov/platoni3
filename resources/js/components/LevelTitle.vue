<template>

<div class="my-10 flex justify-center flex-wrap"
:style="{ background : 'linear-gradient(var(--main-bg-color) 47%, #f2f2f2 49%, #f2f2f2 50%, var(--main-bg-color) 51%)'}">

    <div class="text-right"></div>

    <div class="">

        <div class="inline-block rounded-md p-[.2em]
        text-[.9em] sm:text-[.6em]"
        :style="{background : gradientBackground }">
            <div class="bg-white rounded-md border-2 py-1 px-3">
                {{ title }}
                <span class="text-[.7em] bg-stone-200 rounded-md py-[.3em] px-[.8em]">{{ progressPercent }}<span class="text-[.8em]">%</span></span>
            </div>
        </div>

    </div>

    <div class="text-left"></div>

</div>

</template>

<script setup>
import { useGradientSegment } from '@/use/GradientSegment'

const props = defineProps({
    title       : String,
    progress    : Number,
    all         : Number,
})

const progressPercent = Math.round(props.progress * 100 / props.all);

const gradientBackground = (props.progress != 'undefined' && props.all > 0)
    ? useGradientSegment(progressPercent, '#a3e635', '#f5f5f4' )
    : 'inherit'
</script>
