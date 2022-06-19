const Input = {

    namespaced: true,

    state : () => ({
        inputArea : '',
        maxAnswerLen : 6,
    }),

    mutations : {
        setInputArea    : (state, newVal) => { state.inputArea = String(newVal) }
    }
}

export default Input
