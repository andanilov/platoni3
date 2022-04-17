<template>

<div class="my-10 flex justify-center flex-wrap"
 :style="{ background : 'linear-gradient(white 47%, #f2f2f2 49%, #f2f2f2 50%, white 51%)'}">
    <div class="w-1/3 text-right">
    
    </div>
    <div class="w-1/3">

        <div class="inline-block rounded-md p-[.2em]" 
        :style="{background : gradientBackground }">
            <div class="bg-white rounded-md border-2 py-1 px-3">{{ title }}</div>
        </div>

        
    </div>
    <div class="w-1/3 text-left">
    <!-- {{ 
        (props.progress != 'undefined' && props.all > 0) 
        ? props.progress + ' / ' + props.all 
        : '' 
    }} -->
    </div>          
    
</div>

</template>

<script setup>
import { useGradientSegment } from '@/use/GradientSegment'

const props = defineProps({
    title       : String,
    progress    : Number,
    all         : Number,
})

const gradientBackground = (props.progress != 'undefined' && props.all > 0) 
    ? useGradientSegment( Math.round(props.progress * 100 / props.all), '#a3e635', '#f5f5f4' )
    : 'inherit'



console.log(gradientBackground);

</script>