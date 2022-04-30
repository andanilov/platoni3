<template>

    <nav-bar/>
    <hr/>
    <slot/>
    <footer-bar/>

</template>

<script setup>
import NavBar from '@/components/NavBar'
import FooterBar from '@/components/FooterBar'

const props = defineProps({ currentUser: Object })

</script>
