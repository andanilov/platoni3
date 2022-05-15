<template>

    <Link
    v-if="allMistakes"
    href="/Mistakes">

        <screen-hidden v-if="allMistakes >= maxMistakes" zIndex="40"/>

        <div class="relative aspect-square m-1 flex z-40 w-[4rem]"
        :class="{'animate-pulse' : allMistakes >= maxMistakes}">

            <!-- Progress circle -->
            <div class="absolute inset-x-0 bottom-0 h-full rounded-full"

            :style="allMistakes >= maxMistakes
                        ? 'background: red'
                        : 'background: ' + useGradientSegment( Math.round(allMistakes * 100 / maxMistakes) , '#dc2626')">
            </div>

            <!-- <div class="relative flex place-items-center rounded-full z-10 border-white border-8 aspect-square">&nbsp; -->
            <div class="m-1 relative flex justify-center items-center rounded-full z-10 bg-red-400 border-4 border-white aspect-square
            text-[1.5rem] sm:text-[2rem] text-white">
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
