<template>

    <div class="w-full h-4 rounded-2xl"
    :style="{ background: useGradientProgress( useTaskProgress() ) }">
    </div>

</template>

<script setup>
import { useGradientProgress } from '@/use/GradientProgress'
import { useTaskProgress } from '@/use/TaskProgress'
</script>
