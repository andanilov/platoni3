<template>

    <wrapper-page :currentUser="currentUser">
        <div class="grid grid-cols-12
        gap-4   sm:gap-5 lg:gap-8
        p-4     sm:p-6
        text-[1rem] sm:text-[1.5rem] lg:text-[2rem]">

            <div class="col-span-9 rounded-lg bg-stone-50 text-stone-800 p-4 lg:p-12 text-ellipsis overflow-hidden text-center text-[1.5rem] sm:text-[2.5rem] lg:text-[3.5rem]">
                <span class="text-[.8em]">Привет,</span>&nbsp;{{ currentUser ? currentUser.name : 'Гость' }}&nbsp;!
            </div>

            <grid-card
                colspan="3"
                bgColor="#e5e5e5"
                color="#737373"
                :title="32 + users"
                description="игроков"/>


            <grid-card
                colspan="3"
                bgColor="#f1f5f9"
                color="#64748b"
                :title="levels"
                description="уровней"/>
            <div class=" uppercase col-span-6 rounded-lg bg-lime-500 text-white p-4 flex justify-center items-center animate-pulse">
                <Link href="/quests" class="text-[1.2rem] sm:text-[1.8rem] lg:text-[2.7rem]">
                    {{ currentUser ? 'Продолжить' : 'Попробовать' }}
                </Link>
            </div>
            <grid-card
                colspan="3"
                bgColor="#e4e4e7"
                color="#71717a"
                :title="quests"
                description="заданий"/>


            <grid-card
                v-if="currentUser"
                colspan="4"
                bgColor="#d9f99d"
                color="#65a30d"
                :title="`${maxUserLevel}`"
                :description="`текущий\n\rуровень`"/>
            <grid-card
                v-if="currentUser"
                colspan="4"
                bgColor="#d9f99d"
                color="#65a30d"
                :title="`${userQuestsPassed}`"
                :description="`заданий\n\rпройдено`"/>
            <grid-card
                v-if="currentUser"
                colspan="4"
                bgColor="#d9f99d"
                color="#65a30d"
                :title="`${countTasksUsers}`"
                :description="`примеров\n\rпройдено`"/>



            <div class="col-span-6 rounded-xl bg-cyan-50 text-cyan-800 p-4 text-ellipsis overflow-hidden text-center text-[2rem]">
                <span class="block text-[1.5rem]">Детям</span>
                <ul class="list-decimal text-[1rem] text-left p-6 ">
                    <li>Играют, решая примеры</li>
                    <li>Соревнуются с друзьями</li>
                </ul>
            </div>

            <div class="col-span-6 rounded-xl bg-violet-50 text-violet-800 p-4 text-ellipsis overflow-hidden text-center text-[2rem]">
                <span class="block text-[1.5rem]">Родителям</span>
                <ul class="list-disc text-[1rem] text-left p-6 ">
                    <li>Ежедневные отчёты</li>
                    <li>Наглядный прогресс обучения</li>
                </ul>
            </div>
        </div>

    </wrapper-page>

</template>

<script setup>
import { computed, watchEffect, ref } from 'vue'
import { useGetUser } from '@/use/GetUser.js'
import WrapperPage from '@/components/WrapperPage.vue'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import GridCard from '@/components/GridCard'

// import { Link } from '@inertiajs/inertia-vue3'


const props = defineProps({
    user : Object,
    users : Number,
    quests: Number,
    levels: Number,
    countTasks: Number,

    userQuestsPassed: Number,
    countTasksUsers: Number,
    maxUserLevel: Number,
})

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })
</script>

