<template>

    <div :style="{ background: useGradientProgress( progress ) }"></div>

</template>

<script setup>
import { useGradientProgress } from '@/use/GradientProgress'

const props = defineProps({ progress: Number })
</script>
