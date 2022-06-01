import { createStore } from 'vuex'
import Quests from '@/store/Quests'
import Quest from '@/store/Quest'
import User from '@/store/User'
import Mistakes from '@/store/Mistakes'
import Input from '@/store/Input'
import GoBack from '@/store/GoBack'


const store = createStore({

    modules: {
        User,
        Quests,
        Quest,
        Mistakes,
        Input,
        GoBack,
    }

})

export default store
