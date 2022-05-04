<template>

    <wrapper-page :currentUser="currentUser">

        <div class=""
        v-if="loadingMap">LOADING!!</div>

        <div class="flex flex-col-reverse"
        v-else>
            <levels-output
            :user="currentUser"
            :questsModel="questsMap"
            />
        </div>

    </wrapper-page>

</template>

<script setup>
import { computed, watchEffect, ref } from 'vue'

import WrapperPage from '@/components/WrapperPage.vue'
import LevelsOutput from '@/components/LevelsOutput'

import { useGetUser } from '@/use/GetUser.js'
import { useQuestsMap } from'@/use/QuestsMap'


const props = defineProps({ user : Object })


// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })


// -- Get and update quests map (when user logged)
const { loading : loadingMap, questsMap, updateQuestsMap }  = useQuestsMap()
watchEffect(() => { updateQuestsMap(props.user) } )

</script>
