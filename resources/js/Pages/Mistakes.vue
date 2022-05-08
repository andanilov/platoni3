<template>

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

// import { useQuest } from '@/use/Quest'

// const props = defineProps({ mistakes: Object })

// // -- Quest initialisation
// const { taskStatus } = useQuest(props.quest)

const {
    mistakes,
    taskStatus,
    currentTask,
    corrected,
    startMistakesQuest
} = useMistakes()

// -- Start mistakes quest
startMistakesQuest()

</script>
