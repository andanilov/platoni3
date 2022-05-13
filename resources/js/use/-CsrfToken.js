// import { useFetch } from '@/use/Fetch'

 export async function useCsrfToken(token = false) {

    // if (updateToken) {

    //     const { response, request } = useFetch()
    //     await request('/get/csfr-token')


    //     if(response.value)
    //         document.head.querySelector("[name~=csrf-token][content]").content = response.value

    // console.log('!!! === Token === ', response.value, ' / ', document.head.querySelector("[name~=csrf-token][content]").content);

    // }


    // if(token)
    //     document.head.querySelector("[name~=csrf-token][content]").content = token

    return false//document.head.querySelector("[name~=csrf-token][content]").content
 }
