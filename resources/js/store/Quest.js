import { ref } from 'vue'

const Quest = {

    namespaced: true,

    state: () => ({

        idQuest      : 0,
        idQuestNext  : 0,

        tasks           : {},
        tasksCount      : 0,
        questPeriod     : 0,
        time            : 30,
        currentTime     : ref(),
        timer           : '',
        status          : 'wait', // wait | right | wrong | finished | loading
        lives           : 3,
        tasks           : [],
        answers         : [],
        mistakes        : [],
        currentTask     : {},
        // inputArea       : '',
    }),

    getters : {

    },

    mutations : {
        setIdQuest      : (state, newVal)           => { state.idQuest = newVal },
        setIdQuestNext  : (state, newVal)           => { state.idQuestNext = newVal },
        setQuestPeriod  : (state, newVal)           => { state.questPeriod = newVal },
        setTime         : (state, newVal)           => { state.time = newVal },
        setTimer        : (state, newVal)           => { state.timer = newVal },
        setCurrentTime  : (state, newVal)           => { state.currentTime = newVal },
        setStatus       : (state, newVal = 'wait')  => { state.status = newVal },
        setStopTimer    : (state, newFunc)          => { state.stopTimer = newFunc },
        setTasks        : (state, newVal)           => { state.tasks = newVal },
        setTasksCount   : (state, newVal)           => { state.tasksCount = newVal },
        setAnswers      : (state, newVal)           => { state.answers = newVal },
        setMistakes     : (state, newVal)           => { state.mistakes = newVal },
        setInputArea    : (state, newVal)           => { state.inputArea = newVal },
        setCurrentTask  : (state, newVal)           => { state.currentTask = newVal },
    },

}

export default Quest
