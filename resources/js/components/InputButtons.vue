<template>

    <div class="grid grid-cols-3 mx-auto w-fit">

            <button class=" font-bold mx-auto rounded-xl shadow-sm border-2 aspect-square
                bg-stone-50 text-gray-500 hover:bg-stone-200 active:bg-stone-50 hover:shadow-none
                w-[6rem] text-[3em]"
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
import { useQuest } from '@/use/Quest'

const {
    buttonsModel,
    addInput,
    deleteInput,
    taskStatus,
} = useQuest()
</script>
