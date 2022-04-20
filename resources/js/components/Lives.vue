<template>

    <base-icon class="float-right ml-[0.1em]"
    v-for="heart in full - empty"
    :key="`full-heart-${heart}`"
    name="heart"
    width="1.4em"
    />

    <base-icon class="float-right ml-[0.1em]"
    v-for="heart in empty"
    :key="`empty-heart-${heart}`"
    name="heartEmpty"
    width="1.4em"
    />

</template>

<script setup>
import BaseIcon from '@/icons/BaseIcon'

const props = defineProps({
    full:   Number,
    empty:  Number,
})
</script>
