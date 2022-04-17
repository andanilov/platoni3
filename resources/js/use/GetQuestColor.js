
const questColors = {

    'default'       :   { bgColor : '#e0f2fe', color: '#075985' },

    'addition2'     :   { bgColor : '#e0f2fe', color: '#075985' },
    'subtraction2'  :   { bgColor : '#fef3c7', color: '#9a3412' },
    'multiply2'     :   { bgColor : '#e9d5ff', color: '#6b21a8' },
    'multiply3skip' :   { bgColor : '#fed7aa', color: '#9a3412' },

}


export function useGetQuestColor(questType) {

    return questColors[questType] ?? questColors['default']

}