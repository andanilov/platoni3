import { useStore } from 'vuex'
import { computed } from 'vue'

export function useTaskProgress() {

    const store = useStore()

    const progress = computed( () => +((store.state.Quest.answers.length + store.state.Quest.mistakes.length) * 100 / store.state.Quest.tasks.length) )

    return progress.value

}
