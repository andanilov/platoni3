import { createStore } from 'vuex'
import Quest from '@/store/Quest'
import User from '@/store/User'


const store = createStore({

    modules: {
        User,
        Quest,
    }
    })

export default store
