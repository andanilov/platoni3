import { useStore } from 'vuex'
import { computed } from 'vue'

export function useQuestLives() {

    const store = useStore()

    const allLives =  computed( () => store.state.Quest.lives )
    const empty =  computed( () => store.state.Quest.mistakes.length )

    return {
        allLives:   allLives.value,
        empty:      empty.value,
    }

}
