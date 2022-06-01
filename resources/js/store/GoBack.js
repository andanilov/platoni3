const GoBack = {

  namespaced: true,

  state: () =>({
      fnQueue: []
  }),

  mutations: {
    setFnQueue: (state, newVal) => { state.fnQueue = newVal },
  }
}

export default GoBack
