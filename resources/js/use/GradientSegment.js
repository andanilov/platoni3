export function useGradientSegment(percent, color, bg = null) {

    bg = bg ?? 'rgba(255, 255, 255, 0)';

    return 'conic-gradient(' + (
        percent >= 50
            ? `${color} 0.${percent - 50}turn, ${bg} 0.${percent - 50}turn, ${bg} 0.5turn, ${color} 0.5turn`
            : `${bg} 0.5turn, ${color} 0.5turn, ${color} 0.${percent + 50}turn, ${bg} 0.${percent + 50}turn`
    ) + ')'

}
