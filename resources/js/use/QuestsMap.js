import { useFetch } from '@/use/Fetch'
import { ref } from 'vue'

export function useQuestsMap() {

    const loading = ref(true)
    const { response, request } = useFetch()

    if( loading ) {
        request('/api/get/map')
        loading.value = false
    }

    return response
}