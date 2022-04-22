<template>
    <div class="text-[4rem] text-center py-2 tabular-nums break-words"
    :class="{
        'text-red-600 flash-wrapper' : taskStatus === 'wrong',
        'text-green-600' : taskStatus === 'right',
        'text-black' : taskStatus === 'wait',
    }"
    v-html="inputStr"></div>

</template>

<script setup>
import { useQuest } from '@/use/Quest'

const {
    inputStr,
    taskStatus
} = useQuest()
</script>
