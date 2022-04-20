export function useGradientProgress(percent = 0, color = '#a3e635', bg = '#f5f5f4') {

    return `linear-gradient(90deg, ${color} 0 ${percent}%, ${bg} ${percent}% 100%)`

}
