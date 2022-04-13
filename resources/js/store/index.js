import { createStore } from 'vuex'
// import User from '@/store/User'


const store = createStore({

    // modules: {
    //     User
    // },

    state: () => ({
        user : {}
    }),

    getters : {
        getUser : state => state.user
    },

    mutations : {
        setUser : (state, newVal) => { state.user = newVal }
    },

})

export default store
