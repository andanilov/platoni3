import { useStore } from 'vuex'
import { computed } from 'vue'
import { useFetch } from '@/use/Fetch'

export function useMistakes(mistakes = null) {

    const store = useStore()
    const STORE = store.state.Mistakes
    const { loading, response, request } = useFetch()
    const inputId   = 'mistakeInput'

    // -- Set Mistakes to store
    mistakes && store.commit('Mistakes/setMistakes', mistakes)


    // -- Set next task
    const setNextTask = () => {

        // - Check if new mistakes exists
        if(!Object.keys(STORE.mistakes).length)
            return theEnd()

        // - Set current task
        store.commit('Mistakes/setCurrentTask', STORE.mistakes.shift())

        // - Set timer
        timerControl()

        // - Chahge task status
        store.commit('Mistakes/setTaskStatus', 'wait')

    }




    // -- Set Timer
    const timerControl = ( clear = true ) => {

        // If interval exists
        STORE.timer && clearInterval(STORE.timer)


        // - Set start time
        store.commit('Mistakes/setTime', STORE.currentTask.time)


        // - Set timer
        store.commit('Mistakes/setTimer', setInterval( () => {

            store.commit('Mistakes/setTime', STORE.time - 1 )

            if(STORE.time === 0)
                checkAnswer()


        }, 1000))
    }




    // --- Check answer
    const checkAnswer = () => {

        // Stop timer
        STORE.timer && clearInterval(STORE.timer)




    }



    // -- Check if the end
    const theEnd = () => {

    }


    // - Start Task
    setNextTask()



    return {
        mistakes    : computed( () => STORE.mistakes ),
        currentTask : computed( () => STORE.currentTask ),
        time        : computed( () => STORE.time ),
        taskStatus  : computed( () => STORE.taskStatus ),
        inputStr    : computed( () => STORE.currentTask.task.replace('_', `<span id="${inputId}">_</span>`)),
    }
}
