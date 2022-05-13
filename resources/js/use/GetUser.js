import { useStore } from 'vuex'
import { ref, computed } from 'vue';

export function useGetUser(user = false, token = false) {

    const store = useStore()

    user != false &&
    user != store.state.User.user &&
    store.commit('User/setUser', computed(() => user))

    return store.state.User.user
}
