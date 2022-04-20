<template>

    <BaseIcon name="timer" width="1.25em" class="float-left mr-1"/>
    {{ time }}

</template>

<script setup>
import BaseIcon from '@/icons/BaseIcon'

const props = defineProps({ time: Number })
</script>
