import { useStore } from 'vuex'
import { computed } from 'vue'
import { useFetchPost } from '@/use/FetchPost'

export function useMistakes(update = false) {

    const store = useStore()
    const STORE = store.state.Mistakes
    const { response, request, loading } = useFetchPost()
    const inputId   = 'mistakeInput'


    // -- Set next task
    const setNextTask = () => {

        // - Check if new mistakes exists
        if(!Object.keys(STORE.mistakes).length)
            return isTheEnd()

        // - Set current task
        store.commit('Mistakes/setCurrentTask', STORE.mistakes.shift())

        // - Set timer
        timerControl()

        // - Chahge task status
        store.commit('Mistakes/setStatus', 'wait')

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

        // Correct = delete mistakes
        if(store.state.Input.inputArea == STORE.currentTask.correct) {

            store.commit('Mistakes/setCorrected', [ ...STORE.corrected, STORE.currentTask.id])
            store.commit('Mistakes/setStatus', 'right')
        }

        // Mistake
        else
            store.commit('Mistakes/setStatus', 'wrong')

        // Check is there the end
        isTheEnd()

        // Goto next task
        //setNextTask()
    }



    // -- Check if the end
    const isTheEnd = async (check = true) => {

        if (check && STORE.mistakes.length)
            return

        if (STORE.corrected.length) {

            store.commit('Mistakes/setStatus', 'loading')
            await request('/delete/mistakes', { id_mistakes: STORE.corrected })
        }

        store.commit('Mistakes/setStatus', 'finished')
    }



    // -- Check if the end
    const finishedTask = () => isTheEnd(false)



    // -- Load Mistakes
    const updateMistakes = async (start = false) => {

        await request('/get/mistakes')

        if(!response)
            return

        // -- set mistakes to STORE
        store.commit('Mistakes/setMistakes', response)

        // -- clear corrected
        store.commit('Mistakes/setCorrected', [])

        // -- set All mistakes number
        store.commit('Mistakes/setAllMistakes', Object.keys(response).length)

        // -- start after loading
        start && setNextTask()

    }



    // -- Mistakes Loading model
    (!STORE.mistakes.length || update) && updateMistakes()



    // -- Start Mistakes quest
    const startMistakesQuest = () => {

        if(!Object.keys(STORE.mistakes).length)
            updateMistakes('start')
        else
            setNextTask()
    }




    return {
        mistakes    : computed( () => STORE.mistakes ),
        currentTask : computed( () => STORE.currentTask ),
        corrected   : computed( () => STORE.corrected ),
        time        : computed( () => STORE.time ),
        taskStatus  : computed( () => STORE.status ),
        inputStr    : computed( () => STORE.currentTask.task.replace('_', `<span id="${inputId}">_</span>`)),
        allMistakes : computed( () => STORE.allMistakes ),
        maxMistakes : STORE.maxMistakes,

        checkAnswer,
        setNextTask,
        finishedTask,
        startMistakesQuest,
    }
}
