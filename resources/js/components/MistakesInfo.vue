<template>

    <Link href="/Mistakes">
        <div class="fixed top-10 right-4 z-50 w-[4rem]">

            <div class="relative aspect-square m-1 flex">

                <!-- Progress circle -->
                <div class="absolute inset-x-0 bottom-0 h-full rounded-full"
                :class="{'animate-ping' : mistakes.length >= maxMistakes}"
                :style="mistakes.length >= maxMistakes
                            ? 'background: red'
                            : 'background: ' + useGradientSegment( Math.round(mistakes.length * 100 / maxMistakes) , '#dc2626', '#fef2f2')">
                </div>

                <!-- <div class="relative flex place-items-center rounded-full z-10 border-white border-8 aspect-square">&nbsp; -->
                <div class="m-1 relative flex justify-center items-center rounded-full z-10 bg-red-400 border-4 aspect-square
                text-[1.5rem] sm:text-[2rem] text-white">
                    {{ mistakes.length }}
                </div>

            </div>

        </div>
    </Link>




</template>

<script setup>
import { useMistakes } from '@/use/Mistakes'
import { Link } from '@inertiajs/inertia-vue3'
import { useGradientSegment } from '@/use/GradientSegment'

const { mistakes, maxMistakes } = useMistakes()

console.log(mistakes, maxMistakes);
</script>
