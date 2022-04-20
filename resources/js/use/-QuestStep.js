import { useStore } from 'vuex'
import { computed } from 'vue'

export function useQuestStep() {

    const store = useStore()


    // -- Set current task
    const setNextTask = () => {

        const tasks = store.state.Quest.tasks
        const currentTask = tasks.shift()

        store.commit('Quest/setCurrentTask', currentTask)
        store.commit('Quest/setInputArea', currentTask.task)
        store.commit('Quest/setTasks', tasks)
    }


    // -- Set first Tasks
    // setNextTask()


    const checkTask = () => {

        // Correct answer
        if(store.state.Quest.inputArea == store.state.Quest.currentTask.correct)
            store.commit('Quest/setAnswers', [...store.state.Quest.answers, { answer: store.state.Quest.inputArea, ...store.state.Quest.currentTask }])

        // Mistake
        else
            store.commit('Quest/setMistakes', [...store.state.Quest.mistakes, { answer: store.state.Quest.inputArea, ...store.state.Quest.currentTask }] )

        // Set new task
        setNextTask()
    }


    return {

        checkTask,

        tasks:          computed( () => store.state.Quest.tasks ),
        answers:        computed( () => store.state.Quest.answers ),
        mistakes:       computed( () => store.state.Quest.mistakes ),
        currentTask:    computed( () => store.state.Quest.currentTask ),

    }


}
