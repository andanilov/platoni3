<template>

    <wrapper-page :currentUser="currentUser">

        <div class=""
        v-if="loadingMap">LOADING!!</div>

        <div v-else>

            <mistakes-info class="aspect-square"/>

            <div class="flex flex-col-reverse">
                <levels-output
                :user="currentUser"
                :questsModel="questsMap"
                />
            </div>

        </div>

    </wrapper-page>
<!-- <pre class="text-[.8em]">
questsMap: {{ questsMap }}
</pre> -->

</template>


<script setup>
import { computed, watchEffect, ref, watch } from 'vue'
import { useGetUser } from '@/use/GetUser.js'
import { useQuestsMap } from'@/use/QuestsMap'
import { useMistakes } from'@/use/Mistakes'
import WrapperPage from '@/components/WrapperPage.vue'
import LevelsOutput from '@/components/LevelsOutput'
import MistakesInfo from '@/components/MistakesInfo'


const props = defineProps({ user : Object })

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })


// -- Get and update quests map (when user logged)
const {
    loading : loadingMap,
    questsMap,
    updateQuestsMap }  = useQuestsMap()
// watchEffect(() => { updateQuestsMap(props.user) } )






</script>
