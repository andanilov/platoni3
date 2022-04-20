import { useStore } from 'vuex'
import { computed, ref } from 'vue'

export function useQuest(init = false) {

    const store     = useStore()
    const STORE     = store.state.Quest
    const inputId   = 'questInput'


    // --- Methods ---


        // -- Set current task

        const setNextTask = () => {

            const tasks = STORE.tasks
            const currentTask = tasks.shift()

            store.commit('Quest/setCurrentTask', currentTask)
            store.commit('Quest/setInputArea', currentTask.task)
            store.commit('Quest/setTasks', tasks)

            // Start timer
            timerStart()

            // Set task status
            store.commit('Quest/setStatus', 'wait')
        }




        // -- Add symbol to input area

        const addInput = (symbol) => {

            const $questInput = document.getElementById(inputId)

            $questInput.innerHTML = $questInput.innerHTML === '_' ? symbol : $questInput.innerHTML + symbol
            store.commit('Quest/setInputArea', $questInput.innerHTML)
        }




        // -- Delete symbol or all symbols from input area

        const deleteInput = (all = false) => {

            const $questInput = document.getElementById(inputId)

            if($questInput.innerHTML.length === 0)
                return

            let newInput = all ? '' : $questInput.innerHTML.substring(0, $questInput.innerHTML.length - 1)
            newInput = newInput === '' ? '_' : newInput

            $questInput.innerHTML = newInput
            store.commit('Quest/setInputArea', newInput)
        }



        // -- Check Answer

        const checkAnswer = () => {

            // Stop timer
            clearInterval(STORE.timer)

            // Correct
            if(STORE.inputArea == STORE.currentTask.correct) {

                store.commit('Quest/setAnswers', [...STORE.answers, { answer: STORE.inputArea, ...STORE.currentTask }])
                store.commit('Quest/setStatus', 'right')
            }

            // Mistake
            else {

                store.commit('Quest/setMistakes', [...STORE.mistakes, { answer: STORE.inputArea, ...STORE.currentTask }] )
                store.commit('Quest/setStatus', 'wrong')
            }
            // Check is there the end
            isTheEnd()

            // Clear input area
            deleteInput(true)

        }



        // -- End of quests

        const isTheEnd = () => {

            // -- Lives left
            if(STORE.mistakes.length >= STORE.lives)
                console.log('The End - LIVES left!')

            // -- Tasks left
            else if(STORE.tasks.length === 0)
                console.log('The End - TASKS left!')

            // Set new task
            // else
            //     setNextTask()

        }



        // -- timer start

        const timerStart = () => {

            store.commit('Quest/setCurrentTime', ref(STORE.time - 1))

            // Add and start timer
            store.commit('Quest/setTimer', setInterval( () => {

                store.commit('Quest/setCurrentTime', ref(STORE.currentTime - 1))

                if(STORE.currentTime === 0)
                    checkAnswer()

            }, 1000))


            // stop timer method
            // store.commit('Quest/setStopTimer', () => { clearInterval(timerId) } )
        }



    // -- First call (initialisation)

    if(init) {

        // -- get Quest
        const questModel = {
            idQuestTpl  : 10,
            time       : 10,
            tasks      : [
                { task : '3+5=_', correct : '8' },
                { task : '1+7=_', correct : '8' },
                { task : '2+5=_', correct : '7' },
                { task : '6+3=_', correct : '9' },
            ]
        }


        // -- Timer
        store.commit('Quest/setTime', questModel.time)

        // -- Tasks
        store.commit('Quest/setTasks', questModel.tasks)

        // -- Answers
        store.commit('Quest/setAnswers', [])

        // -- Mistakes
        store.commit('Quest/setMistakes', [])

        // -- Set first Tasks
        setNextTask()

    }










    return {

        inputStr:       computed( () => STORE.currentTask.task.replace('_', `<span id="${inputId}">_</span>`)),
        buttonsModel:   [1,2,3,4,5,6,7,8,9,'.',0,'del'],

        tasks:          computed( () => STORE.tasks ),
        answers:        computed( () => STORE.answers ),
        mistakes:       computed( () => STORE.mistakes ),
        currentTask:    computed( () => STORE.currentTask ),
        currentTime:    computed( () => STORE.currentTime ),
        taskStatus:     computed( () => STORE.status ),
        allLives:       STORE.lives,

        setNextTask,
        addInput,
        deleteInput,
        checkAnswer,
        setNextTask,

    }

}
