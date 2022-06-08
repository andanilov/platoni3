<template>
    <div class=" mt-20 sm:mt-28 lg:mt-36"></div>
    <div class="fixed left-0 right-0 z-50
    -mt-20 sm:-mt-28 lg:-mt-36">
        <div class="mx-auto max-w-5xl">
            <div class="flex flex-row gap-2 mt-2 mx-2 rounded-xl border-2"
            style="background: linear-gradient(to bottom, #e5e7eb .4rem, #f5f5f5 .4rem, #f5f5f5);">

                <div class="basis-1/4 pl-4">
                    <Link href="/" class="inline-block top-navi text-slate-500
                    leading-3 sm:leading-4 lg:leading-5
                    text-[.8rem] sm:text-[1.4rem] lg:text-[2rem]
                    pt-3 sm:pt-5 lg:pt-7
                    pl-0 lg:pl-4"
                    :class="{'selected': currentRoute === '/'}">
                        <span class="uppercase">Платони</span><br/>
                        <span class=" lowercase text-[.6em]">Учимся&nbsp;считать</span>
                    </Link>
                </div>

                <div class="basis-1/2">
                    <nav-menu/>
                </div>

                <div class="basis-1/4 text-right pr-4">
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
