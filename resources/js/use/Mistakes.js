import { useStore } from 'vuex'
import { computed } from 'vue'
import { useFetch } from '@/use/Fetch'
import { useFetchPost } from '@/use/FetchPost'
import { Inertia } from '@inertiajs/inertia'
import { useGoBack } from '@/use/GoBack'

export function useMistakes(mistakesLoaded = []) {

    const store = useStore()
    const STORE = store.state.Mistakes
    const { response : responseGet, request : requestGet, loading : loadingGet } = useFetchPost()
    const { response, request, loading } = useFetchPost()
    const inputId   = 'mistakeInput'

    const { addToGoBackQueue } = useGoBack()


    // -- Set next task
    const setNextTask = () => {
        // - Check if quest finished or the first step (before mistakes loading)
        if(!Object.keys(STORE.mistakes).length)
            return STORE.allMistakes ? isTheEnd() : updateMistakes('start');
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

            if(+STORE.time <= 0)
                checkAnswer()
        }, 1000))

        // If goBack buttom pressed
        addToGoBackQueue(() => clearInterval(STORE.timer));
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
    }



    // -- Check if the end
    const isTheEnd = async (check = true) => {

        if (check && Object.keys(STORE.mistakes).length)
            return

        if (STORE.corrected.length) {

            store.commit('Mistakes/setStatus', 'loading')
            await request('/delete/mistakes', { id_mistakes: STORE.corrected })
        }
        store.commit('Mistakes/setStatus', 'finished')
    }



    // -- Check if the end
    const finishedTask = () => isTheEnd(false)



    // -- Clear Store
    const clearMistakesStore = () => {
        store.commit('Mistakes/setMistakes', [])
        store.commit('Mistakes/setCorrected', [])
        store.commit('Mistakes/setCurrentTask', [])
        store.commit('Mistakes/setAllMistakes', 0)
    }



    // -- return to the Map
    const goToMap = () => Inertia.get('/quests')


    // -- Repeat mistakes quest
    const goToRepeatMistakesQuest = () =>
        STORE.corrected.length === STORE.allMistakes
        ? Inertia.get('/quests')
        : updateMistakes('start')



    // -- Load Mistakes
    const updateMistakes = async (start = false) => {
        // -- If loading mow to stop
        if (STORE.status === 'loading')
            return

        // -- clear current and corrected
        clearMistakesStore()

        // If no loaded data from call useMistakes to load it
        if (!mistakesLoaded.length || mistakesLoaded.length === 0) {

            // -- set status loading
            store.commit('Mistakes/setStatus', 'loading')

            // -- get mistakes
            await requestGet('/get/mistakes')
            if(!response)
                return
            else
                mistakesLoaded = responseGet.value

            store.commit('Mistakes/setStatus', '')
        }

        // -- set mistakes to STORE
        store.commit('Mistakes/setMistakes', mistakesLoaded)

        // -- set All mistakes number
        store.commit('Mistakes/setAllMistakes', mistakesLoaded.length)

        // -- start after loading
        start && setNextTask()
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
        goToRepeatMistakesQuest,
        goToMap,
        updateMistakes,

    }
}
