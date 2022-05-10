import { ref } from 'vue'

export function useFetch() {

    let response    = ref()
    let loading     = ref(false)

    const request = async (url, options = []) => {

        loading.value = true

        const res = await fetch(url, options)
        response.value = await res.json()

        loading.value = false
    }

    return {
        loading,
        response,
        request
    }
}
