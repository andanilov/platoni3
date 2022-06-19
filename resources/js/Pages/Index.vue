<template>

    <head-page title="Научим ребёнка считать"></head-page>

    <wrapper-page :currentUser="currentUser">
        <div class="grid grid-cols-12 tracking-wider
        gap-4   sm:gap-5 lg:gap-8
        p-4     sm:p-6">

            <div class="col-span-9 rounded-lg bg-white text-stone-600 flex items-center justify-center text-[1em]
            p-4 lg:p-12">
                <span class="text-[.8em]">Привет,</span>&nbsp;
                <span class="truncate"> {{ currentUser ? (currentUser.name || currentUser.email) : 'Незнакомец' }}!</span>
            </div>

            <grid-card class="col-span-3"
                bgColor="#fef3c7"
                color="#d97706"
                :title="String(32 + users)"
                description="игроков"
                img="img/boy1.png"/>


            <grid-card class="col-span-3"
                bgColor="#e0f2fe"
                color="#0369a1"
                :title="String(levels)"
                description="уровней"
                img="img/levels.png"/>
            <div class="animate-pulse col-span-6 rounded-lg bg-lime-500 text-white flex justify-end items-center
            p-2 sm:p-6 lg:p-10  "
            style="background: #ecfccb url(img/teaching.png) no-repeat; background-size: contain;">
                <Link href="/quests" class="text-lime-600 bg-[#ecfccb]
                text-[1.3em] sm:text-[1.5em] pl-2">
                    {{ currentUser ? 'Далее' : 'Вперёд!' }}
                </Link>
            </div>
            <grid-card class="col-span-3"
                colspan="3"
                bgColor="#e4e4e7"
                color="#71717a"
                :title="String(quests)"
                description="заданий"
                img="img/tasks.png"/>


            <grid-card class="col-span-6"
                v-if="currentUser"
                bgColor="#fff"
                color="#71717a"
                :title="String(maxUserLevel)"
                :description="`текущий\n\rуровень`"/>
            <grid-card class="col-span-6"
                v-if="currentUser"
                bgColor="#fff"
                color="#71717a"
                :title="String(countTasksUsers)"
                :description="`примеров\n\rпройдено`"/>


            <div class="col-span-6 rounded-xl bg-white text-rose-400 text-ellipsis overflow-hidden text-[.8em]
            p-4 sm:p-6">
                <span class="text-[1.3em] pb-6 inline-block underline decoration-1">Детям</span>
                <p class="inline-block pb-4">&#10004; Играют, решая примеры</p>

                <p>&#10004; Соревнуются с друзьями</p>
            </div>

            <div class="col-span-6 rounded-xl bg-white text-fuchsia-400 text-ellipsis overflow-hidden text-[.8em]
            p-4 sm:p-6">
                <span class="text-[1.3em] pb-6 inline-block underline decoration-1">Родителям</span>
                <p class="inline-block pb-4">&#10004; Ежедневные отчёты</p>

                <p>&#10004; Наглядный прогресс</p>
            </div>

            <div class="col-span-12 rounded-xl p-4 text-ellipsis overflow-hidden text-center">
                <div class="andidandi-logo size3 anim">
                    <a href="https://andidandi.ru" title="AndiDandi - Разработка сайтов и web-приложений"><span class="big">D</span><small>*</small><small>[</small><span class="big">A</span><span class="big">a</span><small>]</small>ndi</a>
                    <span>web-development</span>
                </div>
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
