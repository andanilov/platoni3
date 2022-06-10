<template>
<div class="top-navi top-menu">
    <Link :href="href" class="block
    py-2 px-3 sm:py-3 sm:px-4 lg:py-4 lg:px-5
    ">
        <base-icon class="inline-block
        w-7 sm:w-10 lg:w-14
        h-7 sm:h-10 lg:h-14"
        :name="icon"/>
    </Link>
</div>
</template>

<script setup>
import BaseIcon from '@/icons/BaseIcon'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    href: String,
    icon: String
});

</script>


