<template>

<div class="grid grid-cols-2 text-center">

    <div class="col-span-2 w-full flex items-center justify-center font-bold tracking-wider
    h-[30vh] uppercase animate-pulse">

        <span class="text-red-600  text-[3rem]"
        v-if="mistakes.length > 2">
            Поражение
        </span>

        <span class="text-amber-400  text-[3.5rem]"
        v-else>
            Победа!
        </span>

    </div>

    <div class="bg-stone-50 aspect-square flex items-center text-lime-600 rounded-xl font-bold ml-6 mr-4 mb-6">
        <div class="text-[5rem] w-full leading-none">
            {{ answers.length }}
            <div class="text-[1rem] uppercase tracking-wider">верных</div>
        </div>
    </div>

    <!-- <div class=" border-2">
        1 мин 30 сек
    </div> -->


     <div class="bg-stone-50 aspect-square flex items-center text-red-500 rounded-xl font-bold ml-6 mr-4 mb-6">
        <div class="text-[5rem] w-full leading-none">
            {{ mistakes.length }}
            <div class="text-[1rem] uppercase tracking-wider">ошибки</div>
        </div>
    </div>

    <div class="col-span-2 p-4 text-red-600 py-10"
    v-if="mistakes.length > 2">
        Ошибки:
        <span class="px-2 border-red-600 border-[1px] text-red-600 mx-1 rounded-lg"
        v-for="mistake in mistakes"
        :key="mistake.task">
            {{ mistake.task }}
        </span>
    </div>

    <Link class="px-3"
    href="/" >
        <but type="info" class="w-full">На карту</but>
    </Link>

    <Link class="px-3"
    v-if="mistakes.length > 2"
    :href="`/quest/${idQuest}`">
        <but type="warning" class="w-full">Ещё раз</but>
    </Link>

    <Link class="px-3"
    v-else
    :href="`/quest/${idQuestNext}`">
        <but type="ok" class="w-full">Далее</but>
    </Link>

</div>


</template>

<script setup>
import But from '@/components/But'
import { Link } from '@inertiajs/inertia-vue3'
import { useQuest } from '@/use/Quest'

const {
    mistakes,
    answers,
    idQuest,
    idQuestNext,
} = useQuest()

console.log();

</script>
