<template>

    <div class="grid mx-auto mt-5 px-5
    w-full
    sm:w-[50%]
    ">
        <but
        v-if="taskStatus != 'right' && taskStatus != 'wrong'"
        type="ok"
        @click="checkAnswer()">Ответить</but>

        <but
        v-else
        :type="taskStatus === 'right' ? 'ok' : 'error'"
        @click="setNextTask()">Далее</but>


    </div>

</template>

<script setup>
import But from '@/components/But'
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
