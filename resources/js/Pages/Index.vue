<template>

    <wrapper-page :currentUser="currentUser">
        <div class="flex flex-col-reverse">
            <levels-output
            :user="currentUser"
            :questsModel="questsMap"
            />
        </div>
    </wrapper-page>

</template>

<script setup>
import { computed } from 'vue'

import WrapperPage from '@/components/WrapperPage.vue'
import LevelsOutput from '@/components/LevelsOutput'

import { useGetUser } from '@/use/GetUser.js'
import { useQuestsMap } from'@/use/QuestsMap'


const props = defineProps({
  user : Object,
})


// -- Get and update current user
const currentUser = computed(() => useGetUser(props.user))
computed(() => { useGetUser(props.user) })


// -- Get quests map
const questsMap = useQuestsMap()

</script>
