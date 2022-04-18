<template>

    <div class="mx-auto max-w-5xl text-center w-full"
    v-for="(quests, questsId) in questsModel"
    :key="'quests' + questsId">

        <level-title
        :title="`Уровень ${questsId}`"
        :progress="6"
        :all="10"
        />
        
        <div class="flex justify-center flex-wrap">

            <quest-output
            v-for="quest in quests"
            :quest="quest" 
            :key="questsId + quest.questName"                    
            />

        </div>
    </div>

</template>

<script setup>
import QuestOutput from '@/components/QuestOutput'
import LevelTitle from '@/components/LevelTitle'


const props = defineProps({ questsModel : Object })

</script>