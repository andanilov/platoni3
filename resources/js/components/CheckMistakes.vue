<template>

    <div class="grid mx-auto mt-5 px-5 w-full sm:w-[50%]">

        <but
        v-if="taskStatus === 'wrong' || taskStatus === 'right'"
        type="warning"
        @click.prevent
        @click="finishedTask()">Сохранить и выйти</but>

        <but
        v-if="taskStatus === 'wrong' || taskStatus === 'right'"
        :type="taskStatus === 'right' ? 'ok' : 'error'"
        @click="setNextTask()">Далее</but>

        <but
        v-else
        type="ok"
        @click="checkAnswer()">Ответить</but>

    </div>

</template>

<script setup>
import But from '@/components/But'
import { useMistakes } from '@/use/Mistakes'

const { taskStatus,
        setNextTask,
        finishedTask,
        checkAnswer,
} = useMistakes()

let butGoTo = false
if (taskStatus === 'right')
    butGoTo = 'ok'
else if (taskStatus === 'wrong')
    butGoTo = 'error'


</script>
