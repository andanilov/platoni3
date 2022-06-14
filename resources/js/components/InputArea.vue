<template>
    <div class="text-center py-2 tabular-nums break-words
    "
    :class="{
        'text-red-600 flash-wrapper' : taskStatus === 'wrong',
        'text-green-600' : taskStatus === 'right',
        'text-black' : taskStatus === 'wait',
        'text-[5rem]' : taskStr.length < 8,
        'text-[4rem]' : taskStr.length >= 8 && taskStr.length < 11,
        'text-[3rem]' : taskStr.length >= 11,

    }"
    v-html="setInputStr(taskStr)"></div>

    <div class="grid grid-cols-3 mx-auto w-fit">

        <button class="font-bold mx-auto rounded-xl shadow-sm border-2 aspect-square bg-white text-gray-500 hover:bg-stone-200 active:bg-stone-50 hover:shadow-none
        w-[2em]
        text-[6vh] lg:text-[4.8vh]"
        style="margin: .5rem"
        :disabled="taskStatus != 'wait'"
        v-for="but in buttonsModel"
        :key="`inputBut-${but}`"
        @click="but === 'del' ? deleteInput() : addInput(but)">
            {{ but === 'del' ? '×' : but }}
        </button>

    </div>

</template>

<script setup>
import { useInput } from '@/use/Input'

const {
    buttonsModel,
    inputId,
    addInput,
    deleteInput,
    inputArea,
    setInputStr,
} = useInput()

const props = defineProps({
    taskStr : String,
    taskStatus  : String,
})

</script>
