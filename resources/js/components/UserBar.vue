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

    <div v-else>

        <button @click="registerToggle">Регистрация</button>&nbsp;
        <button @click="loginToggle">Вход</button>

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

<script>
import ModalWin from '@/components/ModalWin'
import DropdownMenu from '@/components/DropdownMenu'
import Login from '@/Pages/Auth/Login'
import Register from '@/Pages/Auth/Register'

import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3'
import { computed, onUpdated, onUnmounted, onMounted, watchEffect     } from 'vue'

import { useGetUser } from '@/use/GetUser'
import { useToggle } from '@/use/Toggle'


export default {

    components: {
        ModalWin, DropdownMenu,
        Login, Register, Inertia, Link
    },

    // methods: {
    //     out() { Inertia.post(route('logout')) }
    // },

    setup() {

        let { show: loginShow, toggle: loginToggle } = useToggle()
        let { show: registerShow, toggle: registerToggle } = useToggle()

        let currentUser = computed( () => useGetUser() )

        return {
            currentUser,
            loginShow, loginToggle,
            registerShow, registerToggle,
            out: () => {
                Inertia.post(route('logout') )
                loginShow.value = registerShow.value = false
            }
        }
    },
}
</script>
