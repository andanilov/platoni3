import { createStore } from 'vuex'
import Quest from '@/store/Quest'
// import User from '@/store/User'


const store = createStore({

    modules: {
        // User,
        Quest,
    },

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
