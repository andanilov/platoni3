<template>

    <div class="flex flex-row px-2 py-3 w-full justify-center">

        <div class="w-1/10 min-w-fit">
            <timer
            :time="time"
            :animation="taskStatus === 'wait'"/>
       </div>

        <div class="w-4/5 flex flex-col justify-center items-center px-4">
            Работа над ошибками
        </div>
        <div class="w-1/10 text-right min-w-fit ">
            <span class="px-2 py-[.2em] mx-1 bg-lime-500 text-white rounded-lg">{{ corrected.length }}</span>
            <span class="px-2 py-[.2em] mx-1 bg-stone-100 rounded-lg">{{ taskStatus === 'wait' ? mistakes.length + 1 : mistakes.length }}</span>
            <span class="px-2 py-[.2em] mx-1 bg-red-400 text-white rounded-lg">{{ allMistakes - corrected.length - (taskStatus === 'wait' ? mistakes.length + 1 : mistakes.length) }}</span>
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
