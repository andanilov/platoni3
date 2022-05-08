import { useFetch } from '@/use/Fetch'
import { useCsrfToken } from '@/use/CsrfToken'

export function useFetchPost () {

    const { response, loading, request : requestPost } = useFetch()

    const request = async (url, data) =>

        await requestPost(url, {
            method:     'POST',
            credentials: 'same-origin',
            headers:    {
                'Content-Type': 'application/json', //'application/x-www-form-urlencoded'
                'X-CSRF-Token': useCsrfToken()
            },
            body:       JSON.stringify(data) // body data type must match "Content-Type" header
          })

    return { response, request, loading }
}
