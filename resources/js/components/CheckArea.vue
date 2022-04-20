<template>


<div class=""
v-if="taskStatus === 'right'">

    <button class="w-full"
    @click="setNextTask()">
        Далее
    </button>

</div>

<div class=""
v-else-if="taskStatus === 'wrong'">

    <button class="w-full"
    @click="setNextTask()">
        Далее
    </button>

</div>

<div class=""
v-else>

    <button class="w-full"
    @click="checkAnswer()">
        Ответить
    </button>

</div>


<pre>
    tasks: {{ tasks }}
    answers: {{ answers }}
    mistakes: {{ mistakes }}
    currentTask: {{ currentTask }}
</pre>

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
