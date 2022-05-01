import { createStore } from 'vuex'
import Quests from '@/store/Quests'
import Quest from '@/store/Quest'
import User from '@/store/User'


const store = createStore({

    modules: {
        User,
        Quests,
        Quest,
    }
    })

export default store
