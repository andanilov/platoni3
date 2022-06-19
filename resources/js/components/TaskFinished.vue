<template>

<div class="task-finished">

    <div class="task-finished__title tracking-wider uppercase bg-white">
        <span v-if="mistakes.length > 2" class="text-red-600 text-[4vh] animate-pulse">
            Поражение
        </span>
        <span v-else class="text-amber-400 text-[5vh] animate-pulse">
            Победа
        </span>

    </div>

    <div class="task-finished__successful info bg-lime-100 text-lime-600 text-[12vh]">
        <div>
            {{ answers.length }}
            <div class="text-[.3em]">верных</div>
        </div>
    </div>

    <div class="task-finished__unsuccessful info bg-red-100 text-red-600 text-[12vh]">
        <div>
            {{ mistakes.length }}
            <div class="text-[.3em]">ошибок</div>
        </div>

    </div>

    <div class="task-finished__info info text-[3vh]">

        <div v-if="mistakes.length" class="col-span-2 text-red-600">
            <span class="px-2 border-red-600 border-[1px] text-red-600 mx-1 rounded-lg"
                v-for="mistake in mistakes"
                :key="mistake.task">
                    {{ mistake.task }}
            </span>
        </div>

        <div class=" col-span-2 text-stone-600 mt-6">
            <div class="mx-auto inline-block relative">
                <BaseIcon name="timer" width="1.6em" class="relative inline-block -top-1"/>
                <span class="text-[1.2em] ml-2">{{ useSecondsToMinutes(questPeriod) }}</span>
            </div>
        </div>

    </div>

    <div class="task-finished__buttons">

        <Link class="px-3"
        href="/quests" >
            <but type="info" class="w-full">На карту</but>
        </Link>

        <Link class="px-3"
        v-if="mistakes.length > 2"
        :href="`/quest/${idQuest}`">
            <but type="warning" class="w-full">Ещё раз</but>
        </Link>

        <Link class="px-3"
        v-else-if="+idQuestNext > 0"
        :href="`/quest/${idQuestNext}`">
            <but type="ok" class="w-full">Далее</but>
        </Link>

    </div>
</div>

</template>

<script setup>
import But from '@/components/But'
import BaseIcon from '@/icons/BaseIcon'
import { Link } from '@inertiajs/inertia-vue3'
import { useQuest } from '@/use/Quest'
import { useSecondsToMinutes } from '@/use/SecondsToMinutes'

const {
    mistakes,
    answers,
    idQuest,
    idQuestNext,
    questPeriod,
} = useQuest()
</script>
