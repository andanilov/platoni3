<template>

    <div class="relative basis-1/3 lg:basis-1/4 max-w-[150px] aspect-square m-3">

        <!-- Progress circle -->
        <div class="absolute inset-x-0 bottom-0 h-full rounded-full"
        :style="{background : useGradientSegment( Math.round(quest.progress * 100 / quest.levels) , '#a3e635', '#f5f5f4')}"                     
        ></div>

        <!-- Progress numbers -->
        <div class="absolute bottom-0 right-0 left-0 z-20">
            <span class="bg-white px-2 py-1 border-2 border-white rounded-lg shadow-md">
                {{ quest.progress }} <span class="text-[.7em]">/</span> {{ quest.levels }}
            </span>                            
        </div>


        <div class="relative flex justify-center items-center aspect-square rounded-full align-middle z-10 border-white border-8 m-[.55em]"
        :style="{ background : useGetQuestColor(questId).bgColor }">
            
            <div class="w-full px-3 font-merriweather text-[2.5rem] sm:text-[3.5rem]"
            :style="{ color : useGetQuestColor(questId).color }"
            >{{ quest.title }}</div>

                                        
        </div>
                
    </div>

</template>

<script setup>
import { useGradientSegment } from '@/use/GradientSegment'
import { useGetQuestColor } from '@/use/GetQuestColor'

const props = defineProps({
    questId : String, 
    quest : Object 
})
</script>