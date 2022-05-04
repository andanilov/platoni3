import { useStore } from 'vuex'
import { computed, ref } from 'vue'
import { useFetchPost } from '@/use/FetchPost'
import { useInput } from '@/use/Input'

import { Inertia } from '@inertiajs/inertia'

export function useQuest(initQuest = false) {

    const store = useStore()
    const STORE = store.state.Quest

    const { deleteInput, setInputStr } = useInput()
    const { response, request } = useFetchPost()


    // --- Methods ---


        // -- Set current task

        const setNextTask = () => {

            const tasks = STORE.tasks
            const currentTask = tasks.shift()

            store.commit('Quest/setCurrentTask', currentTask)
            // store.commit('Quest/setInputArea', currentTask.task)
            store.commit('Quest/setTasks', tasks)

            // Clear input area
            setInputStr(currentTask.task)

            // Start timer
            timerStart()

            // Set task status
            store.commit('Quest/setStatus', 'wait')

        }



        // -- Check Answer

        const checkAnswer = () => {

            // Stop timer
            clearInterval(STORE.timer)

            // Correct
            if(store.state.Input.inputArea == STORE.currentTask.correct) {

                store.commit('Quest/setAnswers', [...STORE.answers, { answer: store.state.Input.inputArea, ...STORE.currentTask }])
                store.commit('Quest/setStatus', 'right')
            }

            // Mistake
            else {

                store.commit('Quest/setMistakes', [...STORE.mistakes, { answer: store.state.Input.inputArea, ...STORE.currentTask }] )
                store.commit('Quest/setStatus', 'wrong')
            }

            // -- add task period to quest period
            store.commit('Quest/setQuestPeriod', STORE.questPeriod + STORE.time - STORE.currentTime)

            // Check is there the end
            isTheEnd()


        }




        // -- End of quests

        const isTheEnd = async () => {

            // -- Check Lives and Tasks count
            if(STORE.mistakes.length < STORE.lives && STORE.tasks.length != 0)
                return

            // -- Quest Finishing

            // - If save needed


            store.commit('Quest/setStatus', 'loading')
            await request('/add/user_quest', {
                id_quest_map:   STORE.idQuest,
                answers_num:    STORE.answers.length,
                mistakes_num:   STORE.mistakes.length,
                quest_period:   STORE.questPeriod,
                mistakes:       STORE.mistakes,
            })




            // - set status = finished
            store.commit('Quest/setStatus', 'finished')



        }




        // -- timer start

        const timerStart = () => {

            if(STORE.setTimer)
                clearInterval(STORE.setTimer)

            store.commit('Quest/setCurrentTime', ref(STORE.time - 1))

            // Add and start timer
            store.commit('Quest/setTimer', setInterval( () => {

                store.commit('Quest/setCurrentTime', ref(STORE.currentTime - 1))

                if(STORE.currentTime === 0) {
                    clearInterval(STORE.setTimer)
                    checkAnswer()
                }

            }, 1000))

        }




    // -- First call (initialisation)

    if(initQuest) {

        // -- get Quest
        const questModel = typeof initQuest == 'string'
            ? eval(`(${initQuest})`)
            : initQuest



        // -- Set current quest id and next
        store.commit('Quest/setIdQuest', questModel.idQuest)
        store.commit('Quest/setIdQuestNext', questModel.idQuestNext)

        // -- Timer
        store.commit('Quest/setTime', questModel.time)

        // -- Tasks
        store.commit('Quest/setTasks', questModel.tasks)

        // -- Tasks count
        store.commit('Quest/setTasksCount', questModel.tasks.length)

        // -- Period initialization
        store.commit('Quest/setQuestPeriod', 0)

        // -- Answers
        store.commit('Quest/setAnswers', [])

        // -- Mistakes
        store.commit('Quest/setMistakes', [])

        // -- Set first Tasks
        setNextTask()

    }


    return {

        allLives:       STORE.lives,
        allTasks:       STORE.tasksCount,
        idQuest:        STORE.idQuest,
        idQuestNext:    STORE.idQuestNext,

        tasks:          computed( () => STORE.tasks ),
        answers:        computed( () => STORE.answers ),
        mistakes:       computed( () => STORE.mistakes ),
        currentTask:    computed( () => STORE.currentTask ),
        currentTime:    computed( () => STORE.currentTime ),
        taskStatus:     computed( () => STORE.status ),
        taskProgress:   computed( () => +((STORE.answers.length + STORE.mistakes.length) * 100 / STORE.tasksCount ) ),
        passed:         computed( () => STORE.answers.length + STORE.mistakes.length ),
        left:           computed( () => STORE.tasksCount - STORE.answers.length - STORE.mistakes.length ),
        questPeriod:    computed( () => STORE.questPeriod ),
        inputCommitName: 'Quest/setInputArea',

        setNextTask,
        checkAnswer,
        setNextTask,
    }

}
