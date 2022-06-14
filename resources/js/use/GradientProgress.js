export function useGradientProgress(percent = 0, color = 'rgb(132 204 22)', bg = 'rgb(225 225 225)') {
    return `linear-gradient(90deg, ${color} 0 ${percent}%, ${bg} ${percent}% 100%)`
}
