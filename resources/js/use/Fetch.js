import { ref } from 'vue' 

export function useFetch() {

    let response = ref()

    const request = async (url, options = []) => {

        const res = await fetch(url, options)
        response.value = await res.json()

    }

    return { response, request }

}