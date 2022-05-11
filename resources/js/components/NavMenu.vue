<template>
    <div class="flex mx-auto justify-center">
        <div class="top-navi"
        :class="{'selected': currentRoute === '/quests'}">
            <Link href="/quests">
                <base-icon class="mx-2"
                name="ruler"
                width="24"/>
            </Link>
        </div>

        <div class="top-navi"
        :class="{'selected': currentRoute === '/history'}">
            <Link href="/history">
                <base-icon class="mx-2"
                name="cup"
                width="28"
                opacity="0.7"/>
            </Link>
        </div>
    </div>

</template>

<script setup>
import BaseIcon from '@/icons/BaseIcon'
import { Link } from '@inertiajs/inertia-vue3'

const currentRoute = document.location.pathname
</script>
