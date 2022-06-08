<template>
    <div class="flex mx-auto justify-center">
        <div class="top-navi border-x-2"
        :class="{'selected': currentRoute === '/quests'}">
            <Link href="/quests" class="block
            py-2 px-3 sm:py-3 sm:px-4 lg:py-4 lg:px-5
            ">
                <!-- <span class=" inline-block">Карта</span> -->
                <base-icon class="inline-block
                w-7 sm:w-10 lg:w-14
                h-7 sm:h-10 lg:h-14"
                name="ruler"/>
            </Link>
        </div>

        <div class="top-navi border-r-2"
        :class="{'selected': currentRoute === '/history'}">
            <Link href="/history" class="block
            py-2 px-3 sm:py-3 sm:px-4 lg:py-4 lg:px-5">
                <base-icon class="inline-block
                w-7 sm:w-10 lg:w-14
                h-7 sm:h-10 lg:h-14"
                name="cup"/>
            </Link>
        </div>
    </div>

</template>

<script setup>
import BaseIcon from '@/icons/BaseIcon'
import { Link } from '@inertiajs/inertia-vue3'

const currentRoute = document.location.pathname
</script>
