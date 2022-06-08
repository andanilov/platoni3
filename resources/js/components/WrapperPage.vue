<template>
    <div class="relative max-w-5xl mx-auto">
        <nav-bar/>
        <!-- <div class="pt-16 sm:pt-32 lg:pt-50 ">&nbsp;</div> -->
        <slot/>
        <footer-bar/>
    </div>
</template>

<script setup>
import NavBar from '@/components/NavBar'
import FooterBar from '@/components/FooterBar'
import { Head } from '@inertiajs/inertia-vue3'

const props = defineProps({currentUser: Object})
</script>
