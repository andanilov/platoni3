<template>

    <div class="grid mx-auto mt-5 px-5
    w-full
    sm:w-[50%]
    ">

        <but
        v-if="butGoTo"
        :type="butGoTo"
        @click="setNextTask()">Далее</but>

        <but
        v-else
        type="ok"
        @click="checkAnswer()">Ответить</but>

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

let butGoTo = false
if (taskStatus === 'right')
    butGoTo = 'ok'
else if (taskStatus === 'wrong')
    butGoTo = 'error'


</script>
