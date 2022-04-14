<template>

    <wrapper-page :currentUser="currentUser">
        <h1>Профиль</h1>
        <profile/>
    </wrapper-page>

</template>

<script>
import WrapperPage from '@/components/WrapperPage.vue'
import Profile from '@/pages/Profile/Show.vue'  
import { useGetUser } from '@/use/GetUser.js'
import { computed } from 'vue'

export default {

    components : { 
        WrapperPage, Profile 
    },

    props : { user : Object },

    setup(props) {

        return {
            currentUser : computed(() => useGetUser(props.user))
        }
    },
}
</script>
