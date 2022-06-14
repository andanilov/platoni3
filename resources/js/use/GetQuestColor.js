
const questColors = {

    'default'       : { bgColor : '#e0f2fe', color: '#5a9ebd' }, // Blue

    'addition2'     : { bgColor : '#e0f2fe', color: '#5a9ebd' }, // Blue
    'addition3'     : { bgColor : '#bae6fd', color: '#5d91ac' }, // Sky
    'addition2skip' : { bgColor : '#cffafe', color: '#65a8ae' }, // Cyan
    'addition3skip' : { bgColor : '#ccfbf1', color: '#539c8d' }, // Teal

    'subtraction2'      : { bgColor : '#fef3c7', color: '#9f8e49' }, // Amber
    'subtraction3'      : { bgColor : '#fef9c3', color: '#9c954c' }, // Yellow
    'subtraction2skip'  : { bgColor : '#ffedd5', color: '#a37941' }, // Orange
    'subtraction3skip'  : { bgColor : '#fef3c7', color: '#9f8e49' }, // Amber

    'multiplication2'     :   { bgColor : '#f3e8ff', color: '#8b67b3' }, // Purple
    'multiplication2skip' :   { bgColor : '#ede9fe', color: '#8174bb' }, // Violet

    'any2'      : { bgColor : '#ecfccb', color: '#889f59' }, // Lime
    'any3'      : { bgColor : '#dcfce7', color: '#5a9a70' }, // Green
    'any2skip'  : { bgColor : '#ede9fe', color: '#6e639e' }, // Emerald
    'any3skip'  : { bgColor : '#ecfccb', color: '#889f59' }, // Violet

}

export function useGetQuestColor(questType) {
    return questColors[questType] ?? questColors['default']
}
