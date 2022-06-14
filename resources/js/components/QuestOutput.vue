<template>

    <div class="relative aspect-square m-1
    w-[7em] sm:w-[5em]">

        <Link :href="noLink ? '' : `/quest/${quest.nextId}`">

            <!-- Progress circle -->
            <div class="absolute inset-x-0 bottom-0 h-full rounded-full"
            :style="{ background : !quest.passedNum
                ? '#f5f5f4'
                : quest.passedNum === quest.count
                    ? '#a3e635'
                    : useGradientSegment( Math.round(quest.passedNum * 100 / quest.count) , '#a3e635', '#f5f5f4')}">
            </div>

            <!-- Quest Info -->
            <div v-if="quest.questLevel" class="absolute  left-0 right-0 z-20
            top-2 sm:-top-1">
                <span class="py-1 rounded-lg bg-white
                text-[.7em] sm:text-[.5em]
                px-3 sm:px-4"
                :class="{'text-stone-200' : !quest.passedNum }"
                :style="{ color: quest.passedNum === quest.count ? '#999' : useGetQuestColor(quest.questName).color }">
                    {{ quest.questCount }}
                </span>
            </div>

            <!-- Progress numbers -->
            <div class="absolute bottom-0 right-0 left-0 z-20">
                <span class="bg-white px-2 py-1 rounded-lg shadow-md
                text-[.9em] sm:text-[.7em]"
                :class="{ 'text-stone-200' : !quest.passedNum }"
                :style="{ color: quest.passedNum === quest.count ? '#999' : useGetQuestColor(quest.questName).color }">
                    {{ quest.passedNum }} <span class="text-[.6em]">/</span> {{ quest.count }}
                </span>
            </div>


            <div class="m-2 relative flex justify-center items-center aspect-square rounded-full align-middle z-10 border-white border-8"
            :style="{ background : quest.passedNum === quest.count
                        ? '#f2f2f2'
                        : useGetQuestColor(quest.questName).bgColor,
                     letterSpacing : '-.2em'}">

                <div class="w-full px-3 font-merriweather flex justify-center items-center aspect-square font-bold"
                :style="{ color : quest.passedNum === quest.count ? '#999' : useGetQuestColor(quest.questName).color,
                          fontSize : ['', '2.7em', '2.2em', '2em'].find((el, key) => key === quest.title.length) }">
                    {{ quest.title }}
                </div>

            </div>

        </Link>

    </div>
<!-- {{ quest }} -->
</template>

<script setup>
import { useGradientSegment } from '@/use/GradientSegment'
import { useGetQuestColor } from '@/use/GetQuestColor'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    user  : Object,
    quest : Object,
    noLink: Boolean,
})


if (!props.user) {
    const progress = 0
}

</script>
