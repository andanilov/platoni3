<template>

    <div class="flex flex-row px-2 pt-[1vh] w-full justify-center
    text-[3vh] landscape:text-[3.5vh]">

        <div class="w-1/10 min-w-[3em]">
            <timer
            :time="time"
            :animation="taskStatus === 'wait'"/>
       </div>

        <div class="w-4/5 text-[.7em] uppercase pt-[1vh] px-2 whitespace-nowrap truncate text-ellipsis">
            Работа над ошибками
        </div>

        <div class="w-1/10 text-right min-w-fit text-[.8em]">
            <span class="px-3 py-[.2em] mx-1 bg-lime-500 text-white rounded-lg">{{ corrected.length }}</span>
            <span class="px-3 py-[.2em] mx-1 bg-stone-200 rounded-lg">{{ taskStatus === 'wait' ? mistakes.length + 1 : mistakes.length }}</span>
            <span class="px-3 py-[.2em] mx-1 bg-red-400 text-white rounded-lg">{{ allMistakes - corrected.length - (taskStatus === 'wait' ? mistakes.length + 1 : mistakes.length) }}</span>
        </div>
    </div>

</template>

<script setup>
import { useMistakes } from '@/use/Mistakes'
import Timer from '@/components/Timer'

const {
    time,
    taskStatus,
    mistakes,
    corrected,
    allMistakes,
    currentTask,
} = useMistakes()
</script>
