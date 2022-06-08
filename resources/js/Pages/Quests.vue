<template>

<head-page title="Карта уровней"></head-page>

    <wrapper-page :currentUser="currentUser">

        <loading v-if="loadingMap"/>

        <div v-else>

            <div class="fixed z-40 left-0 right-0 flex flex-row items-center max-h-full justify-between px-4 gap-4 max-w-5xl mx-auto
             top-20 sm:top-32 lg:top-36
            ">

                <div>
                    <message class="z-50"
                    v-if="user && allMistakes >= maxMistakes"
                    type="error"
                    title="Исправьте ошибки!">
                        Для продолжения занятий необходимо исправить накопившиеся ошибки!
                    </message>

                    <message class="z-50"
                    v-if="!currentUser"
                    type="info"
                    title="Авторизируйтесь!">
                        Чтобы получить доступ ко всем занятиям и сохранять прогресс, зарегистрируйтесь и войдите!
                    </message>
                </div>

                <div>
                    <mistakes-info class="aspect-square"
                    v-if="user && allMistakes"
                    :allMistakes="allMistakes"
                    :maxMistakes="maxMistakes"/>
                </div>

            </div>

            <mistakes-info class="aspect-square"
            v-if="user"/>

            <div class="flex flex-col-reverse">
                <levels-output
                :user="currentUser"
                :questsModel="questsMap"
                />
            </div>

        </div>

    </wrapper-page>

</template>

<script setup>
import { computed, ref, watchEffect } from 'vue'
import { useGetUser } from '@/use/GetUser.js'
import { useQuestsMap } from'@/use/QuestsMap'
import { useMistakes } from'@/use/Mistakes'
import WrapperPage from '@/components/WrapperPage.vue'
import LevelsOutput from '@/components/LevelsOutput'
import MistakesInfo from '@/components/MistakesInfo'
import Message from '@/components/Message'
import Loading from '@/components/Loading'
import HeadPage from '@/components/HeadPage'

const props = defineProps({ user : Object })

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })


// -- Get and update quests map (when user logged)
const {
    loading : loadingMap,
    questsMap,
    updateQuestsMap }  = useQuestsMap()

// -- Mistakes
const {
    updateMistakes,
    allMistakes,
    maxMistakes,
} = useMistakes()

currentUser.value && updateMistakes()
</script>
