<template>

    <BaseIcon name="timer" width="1.2em" class="float-left mr-1"
    :class="{ 'flashing-sharp' : +time <= 3 && animation }"
    />

    <span :class="{
        'text-orange-300' : +time <= 5 && +time > 3,
        'text-red-500' : +time <= 3,
    }">
        {{ time }}
    </span>


</template>

<script setup>
import BaseIcon from '@/icons/BaseIcon'

const props = defineProps({
    time: Number,
    animation: Boolean
    })
</script>
