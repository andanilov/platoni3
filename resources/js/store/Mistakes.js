const Mistakes = {

    namespaced: true,

    state : () => ({
        mistakes    : {},
        currentTask : {},
        time        : Number,
        taskStatus  : String,
        imputArea   : String,

        timer       : null,
    }),

    mutations : {
        setMistakes     : (state, newVal) => { state.mistakes = newVal },
        setCurrentTask  : (state, newVal) => { state.currentTask = newVal },
        setTime         : (state, newVal) => { state.time = Number(newVal) },
        setTaskStatus   : (state, newVal) => { state.taskStatus = newVal },
        setInputArea    : (state, newVal) => { state.timer = setInputArea },

        setTimer        : (state, newVal) => { state.timer = newVal },
    }

}

export default Mistakes
