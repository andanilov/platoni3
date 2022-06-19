<template>

    <div class="grid mx-auto px-5 w-full pt-[1vh]">

        <but class="w-[100%] landscape:w-[60%] mx-auto"
        v-if="taskStatus === 'wrong' || taskStatus === 'right'"
        :type="taskStatus === 'right' ? 'ok' : 'error'"
        @click="setNextTask()">Далее</but>

        <but class="w-[100%] landscape:w-[60%] mx-auto"
        v-if="taskStatus === 'wrong' || taskStatus === 'right'"
        type="warning"
        @click.prevent
        @click="finishedTask()">Сохранить и выйти</but>

        <but class="w-[100%] landscape:w-[60%] mx-auto"
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
