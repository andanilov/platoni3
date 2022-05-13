<template>

<div class="grid grid-cols-2 text-center">

    <div class="col-span-2 w-full flex items-center justify-center font-bold tracking-wider
    h-[30vh] uppercase">
        <span class="text-amber-400  text-[3rem]">
            Работа над ошибками
        </span>
    </div>



    <div class="bg-stone-50 aspect-square flex items-center text-lime-600 rounded-xl font-bold ml-6 mr-4 mb-6">
        <div class="text-[5rem] w-full leading-none">
            {{ corrected.length }}
            <div class="text-[1rem] uppercase tracking-wider">Исправлено</div>
        </div>
    </div>


    <div class="bg-stone-50 aspect-square flex items-center text-red-500 rounded-xl font-bold ml-6 mr-4 mb-6">
        <div class="text-[5rem] w-full leading-none">
            {{ allMistakes - corrected.length }}
            <div class="text-[1rem] uppercase tracking-wider">Осталось</div>
        </div>
    </div>

    <div class="px-3">
        <but type="info" class="w-full"
        @click="goToMap()" >На карту</but>
    </div>

    <div class="px-3"
    v-if="corrected.length < allMistakes">
        <but type="warning" class="w-full"
        @click="goToRepeatMistakesQuest()">Ещё раз</but>
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
