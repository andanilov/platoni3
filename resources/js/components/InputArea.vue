<template>
    <div class=" text-4xl text-center" v-html="inputStr"></div>
</template>

<script setup>
import { useQuest } from '@/use/Quest'

const { inputStr } = useQuest()
</script>
