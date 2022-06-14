<template>

    <div class="level-item relative mx-auto max-w-5xl text-center w-full"
    v-for="(quests, questsId) in questsModel"
    :key="'quests' + questsId">

        <semi-hidden v-if="questsId == Object.keys(questsModel).length"/>

        <level-title
        :title="`Уровень ${questsId}`"
        :progress="getProgressQuestLevel(quests)"
        :all="getAllQuestsNum(quests)"/>

        <div class="flex flex-wrap justify-center
        gap-1 sm:gap-5"
        :class="{'opacity-50' : questsModel[questsId-1] && (getProgressQuestLevel( questsModel[questsId-1] ) != getAllQuestsNum( questsModel[questsId-1] ) )}">

            <quest-output
            v-for="quest in quests"
            :quest="quest"
            :user="user"
            :key="questsId + quest.questName"
            :noLink="allMistakes >= maxMistakes"
            />

        </div>

    </div>



</template>

<script setup>
import QuestOutput from '@/components/QuestOutput'
import LevelTitle from '@/components/LevelTitle'
import SemiHidden from '@/components/SemiHidden'
import { useMistakes } from '@/use/Mistakes'
import { computed } from 'vue'

const props = defineProps({
    user : Object,
    questsModel : Object
})

const {
    allMistakes,
    maxMistakes,
} = useMistakes()


const getProgressQuestLevel = quests =>
    quests.length == 1
        ? quests[0].passedNum
        : quests.reduce( (progress, { passedNum }) => progress += passedNum, 0)


const getAllQuestsNum = quests =>
    quests.length == 1
        ? quests[0].count
        : quests.reduce( (countAll, { count }) => countAll += count, 0)
</script>
