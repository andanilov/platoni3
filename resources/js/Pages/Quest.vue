<template>

<div class="max-w-3xl mx-auto p-3">

    <loading v-if="taskStatus === 'loading'"/>

    <task-finished v-else-if="taskStatus === 'finished'"/>

    <div v-else>
        <quest-panel/>
        <input-area/>
        <input-buttons/>
        <check-area/>
    </div>

</div>

</template>

<script setup>
import QuestPanel from '@/components/QuestPanel'
import InputArea from '@/components/InputArea'
import InputButtons from '@/components/InputButtons'
import CheckArea from '@/components/CheckArea'
import TaskFinished from '@/components/TaskFinished'
import Loading from '@/components/Loading'

import { useQuest } from '@/use/Quest'

const props = defineProps({ quest: String })

// -- Quest initialisation
const { taskStatus } = useQuest(props.quest)
</script>
