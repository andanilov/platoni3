<template>

    <div class="grid mx-auto px-5 w-full pt-[2vh]">
        <but class="w-[100%] landscape:w-[50%] mx-auto"
        v-if="taskStatus != 'right' && taskStatus != 'wrong'"
        type="ok"
        @click="checkAnswer()">Ответить</but>

        <but class="w-[100%] landscape:w-[50%] mx-auto"
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
