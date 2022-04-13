const User = {

    namespaced: true,

    state: () => ({
        user : {}
    }),

    getters : {
        getUser : state => state.user
    },

    mutations : {
        setUser : (state, newVal) => { state.user.value = newVal }
    },

}

export default User
