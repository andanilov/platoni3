export function useSort(arr, col, type = false) {

    return arr.sort((left, right) => {
        // type = type ? 1 : -1
        // return (left[col] > right[col]) ? -type : type
        if(!type)
            return (left[col] > right[col]) ? -1 : 1
        else
            return (left[col] < right[col]) ? -1 : 1
    })

}
