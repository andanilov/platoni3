export function useSecondsToMinutes(secs) {

    const min       = new Date(secs * 1000).getMinutes() ? new Date(secs * 1000).getMinutes() + ' мин ' : ''
    const seconds   = new Date(secs * 1000).getSeconds() ? new Date(secs * 1000).getSeconds() + ' сек' : ''

    return min + seconds
}
