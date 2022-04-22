<template>

    <div class=" grid mx-auto mt-5 px-5">

        <button class="rounded-lg py-2 shadow-sm text-[1.5rem] uppercase tracking-wider
        bg-lime-500 text-white"
        v-if="taskStatus === 'right'"
        @click="setNextTask()">
            Далее
        </button>

        <button class="rounded-lg py-2 shadow-sm text-[1.5rem] uppercase tracking-wider
         bg-red-400 text-white"
        v-else-if="taskStatus === 'wrong'"
        @click="setNextTask()">
            Далее
        </button>

        <button class="rounded-lg py-2 shadow-sm text-[1.5rem] uppercase tracking-wider
        bg-lime-500 text-white"
        v-else
        @click="checkAnswer()">
            Ответить
        </button>

    </div>


</template>

<script setup>
import { useQuest } from '@/use/Quest'

const { checkAnswer,
        tasks,
        answers,
        mistakes,
        currentTask,
        taskStatus,
        setNextTask,
} = useQuest()

</script>
