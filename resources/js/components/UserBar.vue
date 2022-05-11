<template>

    <div v-if="currentUser">
        <dropdown-menu
            :title="currentUser.name ?? currentUser.email"
            side="right">
            <ul class="leading-8">
                <li><Link href="/Profile">Профиль</Link></li>
                <li><hr></li>
                <li><a href="#" @click="out">Выход</a></li>
            </ul>
        </dropdown-menu>
    </div>

    <div v-else class="pt-3">

        <button @click="registerToggle">
            <base-icon class="mx-1"
            name="register"
            width="24"
            opacity="0.4"/>
        </button>
        <button @click="loginToggle">
            <base-icon class="mx-1"
            name="login"
            width="24"
            opacity="0.4"/>
        </button>

        <modal-win
        v-if="loginShow"
        :toggle="loginToggle"
        title="Авторизация">
            <login/>
        </modal-win>

        <modal-win
        v-if="registerShow"
        :toggle="registerToggle"
        title="Регистрация">
            <register/>
        </modal-win>

    </div>

</template>

<script setup>
import ModalWin from '@/components/ModalWin'
import DropdownMenu from '@/components/DropdownMenu'
import Login from '@/Pages/Auth/Login'
import Register from '@/Pages/Auth/Register'
import BaseIcon from '@/icons/BaseIcon'
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'
import { useGetUser } from '@/use/GetUser'
import { useToggle } from '@/use/Toggle'

// -- Get and update current user
const currentUser = computed(() => useGetUser())

let { show: loginShow, toggle: loginToggle } = useToggle()
let { show: registerShow, toggle: registerToggle } = useToggle()

const out = () => {
    Inertia.post(route('logout') )
    loginShow.value = registerShow.value = false
}
</script>
