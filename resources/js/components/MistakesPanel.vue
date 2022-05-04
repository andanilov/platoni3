<template>

    <div class="flex flex-row px-2 py-3 w-full justify-center">

        <div class="w-1/10 min-w-fit">
            <timer
            :time="time"
            :animation="taskStatus === 'wait'"/>
       </div>

        <div class="w-4/5 flex flex-col justify-center items-center px-4">
            <!-- <progress-bar
            :progress="taskProgress"
            :passed="passed"
            :left="left"
            /> -->
        </div>
        <div class="w-1/10 text-right min-w-fit">
            <!-- <lives
            :full="allLives"
            :empty="mistakes.length"/> -->
        </div>
    </div>

</template>

<script setup>
import { useMistakes } from '@/use/Mistakes'

const {
    time,
    taskStatus,
} = useMistakes()



// import { useQuest } from '@/use/Quest'
// import { computed, watchEffect } from 'vue'

import Timer from '@/components/Timer'
// import ProgressBar from '@/components/ProgressBar'
// import Lives from '@/components/Lives'

// const {
//     allLives,
//     mistakes,
//     currentTime,
//     taskStatus,
//     taskProgress,
//     passed,
//     left,
// } = useQuest()
</script>
