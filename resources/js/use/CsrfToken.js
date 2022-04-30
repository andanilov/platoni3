 export function useCsrfToken() {
     return document.head.querySelector("[name~=csrf-token][content]").content
 }
