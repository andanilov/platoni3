import { useFetch } from '@/use/Fetch'
import { ref, computed } from 'vue'
import { useStore } from 'vuex'

export function useQuestsMap($user = false) {

console.log('ENTER TO useQuestsMap!')

    const store     = useStore()
    const { loading, response, request } = useFetch()


    const updateQuestsMap = (user = false) => {

        request('/get/map')
        store.commit('Quests/setQuestsLevelsMap', response)

    }

    // -- get quests map and set to store
    updateQuestsMap();


    return {
        loading,
        questsMap : computed( () => store.state.Quests.questsLevelsMap ),
        updateQuestsMap,
    }
}
