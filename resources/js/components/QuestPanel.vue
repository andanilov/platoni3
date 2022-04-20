<template>

    <div class="flex flex-row px-2 py-3">

        <div class="basis-1/8 min-w-fit">
            <timer :time="currentTime"/>
       </div>

        <div class="basis-3/4 flex flex-col justify-center items-center px-4">
            <progress-line/>
        </div>
        <div class="basis-1/8 text-right min-w-fit">
            <lives
            :full="allLives"
            :empty="mistakes.length"/>
        </div>
    </div>

</template>

<script setup>
import { useQuest } from '@/use/Quest'
import { computed, watchEffect } from 'vue'

import Timer from '@/components/Timer'
import ProgressLine from '@/components/ProgressLine'
import Lives from '@/components/Lives'

const { allLives, mistakes, currentTime } = useQuest()
</script>
