const Input = {

    namespaced: true,

    state : () => ({
        inputArea : '',
    }),

    mutations : {
        setInputArea    : (state, newVal) => { state.inputArea = String(newVal) }
    }
}

export default Input
