<template>

    <wrapper-page :currentUser="currentUser">

        History!

    </wrapper-page>

</template>

<script setup>
import { computed, ref } from 'vue'
import { useGetUser } from '@/use/GetUser.js'
import WrapperPage from '@/components/WrapperPage.vue'



const props = defineProps({ user : Object })

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })


</script>
