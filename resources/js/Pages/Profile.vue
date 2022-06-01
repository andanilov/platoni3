<template>

    <head-page title="Ваш профиль"></head-page>

    <wrapper-page :currentUser="currentUser">
        <message title="Настройки">{{ currentUser.name }}, здесь вы сможете изменить настройки Вашего профиля!</message>
        <profile/>
    </wrapper-page>

</template>

<script setup>
import WrapperPage from '@/components/WrapperPage.vue'
import Profile from '@/pages/Profile/Show.vue'
import Message from '@/components/Message'
import HeadPage from '@/components/HeadPage'
import { useGetUser } from '@/use/GetUser.js'
import { computed } from 'vue'

const props = defineProps({ user : Object })
let currentUser = computed(() => useGetUser(props.user))
</script>
