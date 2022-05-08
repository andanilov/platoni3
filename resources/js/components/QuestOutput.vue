<template>

    <div class="relative aspect-square w-[7rem] m-1">

        <Link :href="`/quest/${quest.nextId}`">

            <!-- Progress circle -->
            <div class="absolute inset-x-0 bottom-0 h-full rounded-full"
            :style="{ background : !quest.passedNum
                ? '#f5f5f4'
                : quest.passedNum === quest.count
                    ? '#f9f9f9'
                    : useGradientSegment( Math.round(quest.passedNum * 100 / quest.count) , '#a3e635', '#f5f5f4')}">
            </div>


            <!-- Progress numbers -->
            <div class="absolute bottom-0 right-0 left-0 z-20">
                <span class="bg-white px-2 py-1 rounded-lg shadow-md text-[.9em]"
                :class="{'text-stone-200' : !quest.passedNum }">
                    {{ quest.passedNum }} <span class="text-[.6em]">/</span> {{ quest.count }}
                </span>
            </div>


            <div class="m-2 relative flex justify-center items-center aspect-square rounded-full align-middle z-10 border-white border-8"
            :style="{ background : quest.passedNum === quest.count
                    ? '#f2f2f2'
                    : useGetQuestColor(quest.questName).bgColor}">

                <div class="w-full px-3 font-merriweather flex justify-center items-center aspect-square
                text-[2.5rem] sm:text-[3.5rem]"
                :style="{ color : quest.passedNum === quest.count
                    ? '#ссс'
                    : useGetQuestColor(quest.questName).color}">
                    {{ quest.title }}
                </div>

            </div>

        </Link>

    </div>



</template>

<script setup>
import { useGradientSegment } from '@/use/GradientSegment'
import { useGetQuestColor } from '@/use/GetQuestColor'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    user  : Object,
    quest : Object
})

// console.log(props.user);

if(props.user) {


} else  {

    const progress = 0

}

</script>
