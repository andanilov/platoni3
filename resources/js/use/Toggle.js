import { ref } from 'vue'

export function useToggle(init = false) {

    const show = ref(init)

    const toggle = () => {
        show.value = !show.value
    }

    return { show, toggle }
}
