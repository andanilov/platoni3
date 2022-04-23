<template>

<div class="max-w-3xl mx-auto p-3">

<task-finished/>

    <!-- <task-finished
    v-if="taskStatus === 'finished'"/>

    <div v-else>
        <quest-panel/>
        <input-area/>
        <input-buttons/>
        <check-area/>
    </div> -->

</div>

</template>

<script setup>
import QuestPanel from '@/components/QuestPanel'
import InputArea from '@/components/InputArea'
import InputButtons from '@/components/InputButtons'
import CheckArea from '@/components/CheckArea'
import TaskFinished from '@/components/TaskFinished'

import { useQuest } from '@/use/Quest'

const props = defineProps({ quest: String })

// -- Quest initialisation
const { taskStatus } = useQuest(props.quest)
</script>
