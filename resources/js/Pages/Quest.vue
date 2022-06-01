<template>

<head-page title="Тестирование"></head-page>

<div class="max-w-3xl mx-auto p-3">

    <loading v-if="taskStatus === 'loading'"/>

    <task-finished v-else-if="taskStatus === 'finished'"/>

    <div v-else>
        <quest-panel/>

        <input-area
        :taskStr="currentTask.task"
        :taskStatus="taskStatus"/>

        <check-quest/>
    </div>

</div>

</template>

<script setup>
import QuestPanel from '@/components/QuestPanel'
import InputArea from '@/components/InputArea'
import CheckQuest from '@/components/CheckQuest'
import TaskFinished from '@/components/TaskFinished'
import Loading from '@/components/Loading'
import HeadPage from '@/components/HeadPage'
import { useQuest } from '@/use/Quest'

const props = defineProps({ quest: String })

// -- Quest initialisation
const {
    taskStatus,
    currentTask,
} = useQuest(props.quest)
</script>
