<template>

    <div class="grid grid-cols-3">
        <input-button
        v-for="but in buttonsModel"
        :key="`inputBut-${but}`"
        :press="() => { but === 'del' ? deleteInput() : addInput(but) }"
        >
            {{ but }}
        </input-button>
    </div>

</template>

<script setup>
import { useQuest } from '@/use/Quest'
import InputButton from '@/components/InputButton'

const { buttonsModel, addInput, deleteInput } = useQuest()
</script>
