<template>
<div class="flex mx-auto justify-center">

    <TopMenuItem
    :class="{'selected': currentRoute === '/quests'}"
    href="/quests"
    icon="ruler"/>

    <TopMenuItem
    :class="{'selected': currentRoute === '/history'}"
    href="/history"
    icon="cup"/>

</div>
</template>

<script setup>
import TopMenuItem from '@/components/TopMenuItem'

const currentRoute = document.location.pathname
</script>
