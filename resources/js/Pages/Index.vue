<template>

    <head-page title="Научим ребёнка считать"></head-page>

    <wrapper-page :currentUser="currentUser">
        <div class="grid grid-cols-12 tracking-wider
        gap-4   sm:gap-5 lg:gap-8
        p-4     sm:p-6
        text-[1rem] sm:text-[1.5rem] lg:text-[2rem]">

            <div class="col-span-9 rounded-lg bg-stone-50 text-stone-600 flex items-center justify-center
            p-4 lg:p-12
            text-[1.5rem] sm:text-[2rem] lg:text-[3rem]">
                <span class="text-[.8em]">Привет,</span>&nbsp;
                <span class="truncate"> {{ currentUser ? (currentUser.name || currentUser.email) : 'Незнакомец' }}!</span>
            </div>

            <grid-card class="col-span-3"
                bgColor="#e5e5e5"
                color="#737373"
                :title="String(32 + users)"
                description="игроков"/>


            <grid-card class="col-span-3"
                bgColor="#f1f5f9"
                color="#64748b"
                :title="String(levels)"
                description="уровней"/>
            <div class=" uppercase col-span-6 rounded-lg bg-lime-500 text-white p-4 flex justify-center items-center animate-pulse">
                <Link href="/quests" class="text-[1.2rem] sm:text-[1.8rem] lg:text-[2.7rem]">
                    {{ currentUser ? 'Продолжить' : 'Попробовать' }}
                </Link>
            </div>
            <grid-card class="col-span-3"
                colspan="3"
                bgColor="#e4e4e7"
                color="#71717a"
                :title="String(quests)"
                description="заданий"/>


            <grid-card class="col-span-6"
                v-if="currentUser"
                bgColor="#d9f99d"
                color="#65a30d"
                :title="String(maxUserLevel)"
                :description="`текущий\n\rуровень`"/>
            <grid-card class="col-span-6"
                v-if="currentUser"
                bgColor="#d9f99d"
                color="#65a30d"
                :title="String(countTasksUsers)"
                :description="`примеров\n\rпройдено`"/>



            <div class="col-span-12 sm:col-span-6 rounded-xl bg-cyan-50 text-cyan-800 p-4 text-ellipsis overflow-hidden text-center text-[2rem]">
                <span class="block text-[1.5rem]">Детям</span>
                <ul class="list-disc text-[1rem] text-left p-6">
                    <li>Играют, решая примеры</li>
                    <li>Соревнуются с друзьями</li>
                </ul>
            </div>

            <div class="col-span-12 sm:col-span-6 rounded-xl bg-violet-50 text-violet-800 p-4 text-ellipsis overflow-hidden text-center text-[2rem]">
                <span class="block text-[1.5rem]">Родителям</span>
                <ul class="list-disc text-[1rem] text-left p-6">
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
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import HeadPage from '@/components/HeadPage.vue'
import WrapperPage from '@/components/WrapperPage.vue'
import GridCard from '@/components/GridCard'

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

