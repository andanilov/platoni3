<template>

    <wrapper-page :currentUser="currentUser">
        <br/><br/><br/><br/>
        Вас приветствует сервис Platoni.ru!
    </wrapper-page>

</template>

<script setup>
import { computed, watchEffect, ref } from 'vue'
import { useGetUser } from '@/use/GetUser.js'
import WrapperPage from '@/components/WrapperPage.vue'

const props = defineProps({ user : Object })

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })
</script>
