<template>

<div class="max-w-3xl mx-auto p-3">
    <quest-panel/>
    <input-area/>
    <input-buttons/>
    <check-area/>
</div>

</template>

<script setup>
import QuestPanel from '@/components/QuestPanel'
import InputArea from '@/components/InputArea'
import InputButtons from '@/components/InputButtons'
import CheckArea from '@/components/CheckArea'

import { useQuest } from '@/use/Quest'

const props = defineProps({ quest: String })

// -- Quest initialisation
useQuest(props.quest)

</script>
