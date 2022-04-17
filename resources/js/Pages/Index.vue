<template>

    <wrapper-page :currentUser="currentUser">
        <div class="flex flex-col-reverse">         
            <levels-output :questsModel="questsModel"/>                   
        </div>
    </wrapper-page>

</template>

<script setup>
import { computed, onMounted } from 'vue'

import WrapperPage from '@/components/WrapperPage.vue'
import LevelsOutput from '@/components/LevelsOutput'

import { useGetUser } from '@/use/GetUser.js'


const props = defineProps({
  user : Object,  
})


// -- Get and update current user 
const currentUser = computed(() => useGetUser(props.user))
computed(() => { useGetUser(props.user) })



// -- Get quests

const questsModel = {

    1 : { disabledReason : '', quests : {
            addition2 :     { title: '+', link : '/', progress : 2, levels : 4},
        }},
    2 : { disabledReason : '', quests : {
            addition2 :     { title: '+', link : '/', progress : 1, levels : 4},
            subtraction2 :  { title: '-', link : '/', progress : 2, levels : 5},
        }},
    3 : { disabledReason : '', quests : {
            addition2 :     { title: '+', link : '/', progress : 1, levels : 3},
            subtraction2 :  { title: '-', link : '/', progress : 1, levels : 3},
            multiply2 :  { title: '+-', link : '/', progress : 1, levels : 3},
        }},
    4 : { disabledReason : '', quests : {  
            addition2 :     { title: '+', link : '/', progress : 1, levels : 3},
            subtraction2 :  { title: '-', link : '/', progress : 2, levels : 3},
            multiply2 :     { title: '+-', link : '/', progress : 1, levels : 5},
            multiply3skip :  { title: '+?-', link : '/', progress : 1, levels : 3},
        }},

}

</script>