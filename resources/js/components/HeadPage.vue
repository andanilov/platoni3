<template>

<Head>
  <title>Платони - {{ title }}</title>
</Head>

</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'

const props = defineProps({
    title: String,
})
</script>
