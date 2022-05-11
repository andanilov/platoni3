<template>

    <div class="fixed left-0 right-0 z-50 bg-white">
        <div class="mx-auto max-w-5xl">
            <div class="flex flex-row gap-2 mt-2 mx-2 pb-1 rounded-xl"
            style="background: linear-gradient(to bottom, #e5e7eb 4px, #f5f5f5 4px);">

                <div class="basis-1/4 uppercase pl-4"
                style="font-family: 'Comfortaa', cursive;">
                    <Link href="/" class="inline-block top-navi pt-4"
                    :class="{'selected': currentRoute === '/'}">
                        Платони
                    </Link>
                </div>

                <div class="basis-1/2">
                    <nav-menu/>
                </div>

                <div class="basis-1/4 text-right pr-2">
                    <user-bar/>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import UserBar from '@/components/UserBar'
import NavMenu from '@/components/NavMenu'
import { Link } from '@inertiajs/inertia-vue3'

const currentRoute = document.location.pathname;
</script>
