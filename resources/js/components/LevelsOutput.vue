<template>

    <div class="relative mx-auto max-w-5xl text-center w-full"
    v-for="(quests, questsId) in questsModel"
    :key="'quests' + questsId">

        <semi-hidden v-if="questsId == Object.keys(questsModel).length"/>

        <level-title
        :title="`Уровень ${questsId}`"
        :progress="getProgressQuestLevel(quests)"
        :all="getAllQuestsNum(quests)"/>

        <div class="flex flex-wrap justify-center"
        :class="{'opacity-50' : questsModel[questsId-1] && (getProgressQuestLevel( questsModel[questsId-1] ) != getAllQuestsNum( questsModel[questsId-1] ) )}">

            <quest-output
            v-for="quest in quests"
            :quest="quest"
            :user="user"
            :key="questsId + quest.questName"
            />

        </div>

    </div>

<!-- <pre>
{{ questsModel }}
</pre> -->


</template>

<script setup>
import QuestOutput from '@/components/QuestOutput'
import LevelTitle from '@/components/LevelTitle'
import SemiHidden from '@/components/SemiHidden'

const props = defineProps({
    user : Object,
    questsModel : Object
})

const getProgressQuestLevel = quests =>
    quests.length == 1
        ? quests[0].passedNum
        : quests.reduce( (item1, item2) => item1.passedNum + item2.passedNum )


const getAllQuestsNum = quests =>
    quests.length == 1
        ? quests[0].count
        : quests.reduce( (item1, item2) => item1.count + item2.count )
</script>
