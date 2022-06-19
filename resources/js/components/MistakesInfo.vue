<template>

    <Link
    v-if="allMistakes"
    href="/Mistakes">

        <screen-hidden v-if="allMistakes >= maxMistakes" zIndex="40"/>

        <div class="relative aspect-square m-1 z-40 flex
        w-[6em] sm:w-[4em]"
        :class="{'animate-pulse' : allMistakes >= maxMistakes}">

            <!-- Progress circle -->
            <div class="absolute inset-x-0 bottom-0 h-full rounded-full"

            :style="allMistakes >= maxMistakes
                        ? 'background: red'
                        : 'background: ' + useGradientSegment( Math.round(allMistakes * 100 / maxMistakes), '#dc2626', '#f2f2f2')">
            </div>

            <!-- <div class="relative flex place-items-center rounded-full z-10 border-white border-8 aspect-square">&nbsp; -->
            <div class="m-2 flex justify-center items-center rounded-full z-10 bg-red-400 border-white aspect-square
            text-[3em] sm:text-[2em] text-white
            pt-[0.2em] sm:pt-[0.2em]
            border-8 sm:border-6">
                {{ allMistakes }}
            </div>

        </div>

    </Link>

</template>

<script setup>
// import { useMistakes } from '@/use/Mistakes'
import { Link } from '@inertiajs/inertia-vue3'
import { useGradientSegment } from '@/use/GradientSegment'
import { computed, watchEffect } from 'vue'
import ScreenHidden from '@/components/ScreenHidden'

const props = defineProps({
    allMistakes: Number,
    maxMistakes: Number
})

</script>
