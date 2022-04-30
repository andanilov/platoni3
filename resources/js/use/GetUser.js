import { useStore } from 'vuex'
import { ref, computed } from 'vue';

export function useGetUser(user = false) {

    const store = useStore()

    if(user != false)
        store.commit('User/setUser', computed(() => user))


    return store.state.User.user
}
