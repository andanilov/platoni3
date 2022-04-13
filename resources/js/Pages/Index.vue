<template>

    <wrapper-page :currentUser="currentUser">
        <h1>Index</h1>
        <!-- USER : {{ user }}<br/><br/> -->
        <!-- CURRENT : {{ currentUser }} -->
    </wrapper-page>

</template>

<script>
import WrapperPage from '@/components/WrapperPage.vue'
import { useGetUser } from '@/use/GetUser.js'
import { computed, onMounted } from 'vue'

export default {

    components : {
        WrapperPage
    },

    props : {
        user : Object
    },

    setup(props) {

        // const currentUser = computed(() => useGetUser(props.user))

        // computed(() => {
        //     useGetUser(props.user)
        // })

        return {
            currentUser : computed(() => useGetUser(props.user))
        }
    },
}
</script>
