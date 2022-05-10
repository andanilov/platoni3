<template>
    <div class=" relative max-w-5xl mx-auto">
        <nav-bar/>
        <hr/>
        <slot/>
        <footer-bar/>
    </div>
</template>

<script setup>
import NavBar from '@/components/NavBar'
import FooterBar from '@/components/FooterBar'

const props = defineProps({ currentUser: Object })

</script>
