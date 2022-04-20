import { useStore } from 'vuex'
import { ref, computed } from 'vue'


export function useQuestTimer() {

    const store = useStore()


    // // -- timer start
    // const timerId = setInterval( () => {

    //     store.commit('Quest/setTimer', ref(store.state.Quest.time - 1))

    //     if(store.state.Quest.time === 0)
    //         clearInterval(timerId)

    // }, 1000)


    // -- Set stop timer func
    store.commit('Quest/setStopTimer', () => { clearInterval(timerId) } )


    return {
        time       : computed( () => store.state.Quest.time ),
        stopTimer   : store.state.Quest.stopTimer,
    }

}
