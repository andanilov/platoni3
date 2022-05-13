import { ref } from 'vue'

const Mistakes = {

    namespaced: true,

    state : () => ({
        mistakes    : {},
        allMistakes : 0,
        maxMistakes : 20, // max count mistakes to continue quests
        currentTask : {},
        corrected   : [],
        time        : 0,
        status      : ref(''), // wait | right | wrong | finished | loading
        inputArea   : String,

        timer       : null,
    }),

    mutations : {
        setMistakes     : (state, newVal) => { state.mistakes = newVal },
        setCurrentTask  : (state, newVal) => { state.currentTask = newVal },
        setTime         : (state, newVal) => { state.time = Number(newVal) },
        setStatus       : (state, newVal) => { state.status = newVal },
        setInputArea    : (state, newVal) => { state.inputArea = newVal },
        setCorrected    : (state, newVal) => { state.corrected = newVal },
        setAllMistakes  : (state, newVal) => { state.allMistakes = newVal },
        setTimer        : (state, newVal) => { state.timer = newVal },
    }

}

export default Mistakes
