<template>

<!-- <pre class="text-[.7em]">
currentTask {{ currentTask }}<br/>
corrected {{ corrected }}<br/>
mistakes {{ mistakes }}<br/>
</pre> -->

<div class="max-w-3xl mx-auto p-3">

    <loading v-if="taskStatus === 'loading'"/>

    <mistakes-finished v-else-if="taskStatus === 'finished'"/>

    <div v-else>
        <mistakes-panel/>

        <input-area
        :taskStr="currentTask.task"
        :taskStatus="taskStatus"/>

        <check-mistakes/>
    </div>

</div>

</template>

<script setup>
import MistakesPanel from '@/components/MistakesPanel'
import { useMistakes } from '@/use/Mistakes'
import InputArea from '@/components/InputArea'
import CheckMistakes from '@/components/CheckMistakes'
import MistakesFinished from '@/components/MistakesFinished'
import Loading from '@/components/Loading'

const props = defineProps({mistakes: Object})

console.log('<<<<<<<<<<<<<<<<<<<<< Mistakes.vue >>>>>>>>>>>>>>>>>>>>>>>>>');
const {
    setNextTask,
    mistakes,
    taskStatus,
    currentTask,
    corrected,
    startMistakesQuest,
} = useMistakes(props.mistakes.original[0])
setNextTask()

console.log(props.mistakes.original[0]);

console.log('<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>');
</script>
