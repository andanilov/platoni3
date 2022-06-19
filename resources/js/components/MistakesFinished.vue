<template>

<div class="task-finished">

    <div class="task-finished__title tracking-wider uppercase bg-white">
        <span class="text-stone-600 text-[4vh] animate-pulse">
            Работа над ошибками
        </span>
    </div>

    <div class="task-finished__successful info bg-lime-100 text-lime-600 text-[12vh]">
        <div>
            {{ corrected.length }}
            <div class="text-[.3em]">Исправлено</div>
        </div>
    </div>

    <div class="task-finished__unsuccessful info bg-red-100 text-red-600 text-[12vh]">
        <div>
            {{ allMistakes - corrected.length }}
            <div class="text-[.3em]">Осталось</div>
        </div>

    </div>

    <div class="task-finished__buttons">

        <but type="info"
            @click="goToMap()">
                На карту
        </but>

        <but v-if="corrected.length < allMistakes" type="warning"
            @click="goToRepeatMistakesQuest()">
                Ещё раз
        </but>

    </div>
</div>

</template>

<script setup>
import But from '@/components/But'
import { Link } from '@inertiajs/inertia-vue3'
import { useMistakes } from '@/use/Mistakes'

const {
    corrected,
    allMistakes,
    goToRepeatMistakesQuest,
    goToMap,
} = useMistakes()
</script>
