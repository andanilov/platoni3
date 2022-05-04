<template>

<div class="max-w-3xl mx-auto p-3">

    <!-- <loading v-if="taskStatus === 'loading'"/> -->

    <!-- <task-finished v-else-if="taskStatus === 'finished'"/> -->

    <div>
        <mistakes-panel/>

        <input-area
        :inputStr="inputStr"
        :taskStatus="taskStatus"/>

        <input-buttons
        :taskStatus="taskStatus"/>

        <!-- <check-area/> -->
    </div>

</div>

<pre>
Mistakes: {{ mistakes }}
</pre>

</template>

<script setup>
import MistakesPanel from '@/components/MistakesPanel'
import { useMistakes } from '@/use/Mistakes'
import InputArea from '@/components/InputArea'
// import InputButtons from '@/components/InputButtons'
// import CheckArea from '@/components/CheckArea'
// import TaskFinished from '@/components/TaskFinished'
// import Loading from '@/components/Loading'

import { useQuest } from '@/use/Quest'

const props = defineProps({ mistakes: Object })

// // -- Quest initialisation
// const { taskStatus } = useQuest(props.quest)

const {
    mistakes,
    inputStr,
    taskStatus,
} = useMistakes( props.mistakes )


</script>
