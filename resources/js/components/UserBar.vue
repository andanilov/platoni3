<template>
<div class="text-[.9rem] sm:text-[1.2rem] lg:text-[1.5rem]">
    <div v-if="currentUser">
        <dropdown-menu class="max-w-[5rem] sm:max-w-[13rem] pt-3 sm:pt-5 lg:pt-7"
            :title="currentUser.name || currentUser.email"
            side="right">
            <ul>
                <li class="py-2 sm:py-4"><Link href="/Profile">Профиль</Link></li>
                <li><hr></li>
                <li class="py-2 sm:py-4"><a href="#" @click="out">Выход</a></li>
                <!-- <li><hr></li>
                <li class="py-2 sm:py-4">{{ vw }} x {{ vh }}</li> -->
            </ul>
        </dropdown-menu>
    </div>

    <div v-else class="pt-3 sm:pt-5 lg:pt-7">

        <button @click="registerToggle">
            <base-icon class="mr-1 sm:mr-4
            w-7 sm:w-11
            h-7 sm:h-11"
            name="register"
            opacity="0.4"/>
        </button>
        <button @click="loginToggle">
            <base-icon class="mr-1 sm:mr-4
            w-7 sm:w-10
            h-7 sm:h-10"
            name="login"
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

const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)

</script>
