export function useGradientSegment(percent, color, bg) {
    
    return 'conic-gradient(' + ( 
        percent >= 50 
            ? `${color} 0.${percent - 50}turn, ${bg} 0.${percent - 50}turn, ${bg} 0.5turn, ${color} 0.5turn`
            : `${bg} 0.5turn, ${color} 0.5turn, ${color} 0.${percent + 50}turn, ${bg} 0.${percent + 50}turn` 
    ) + ')'

}