import { ref } from 'vue'
import axios from 'axios'
import { useCookie } from '@/use/Cookie'

export function useFetchPost () {

    const loading = ref(false)
    const response = ref()

    const request = async (url, data) => {

        loading.value = true

        !useCookie('XSRF-TOKEN') && await axios.get('/sanctum/csrf-cookie')

        const res = await axios({
            method: 'post',
            url: url,
            data: data
          });
        response.value = res.data

        loading.value = false

    }

    return { response, request, loading }
}


