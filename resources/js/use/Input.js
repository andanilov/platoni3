import { computed } from 'vue'
import { useStore } from 'vuex'

export function useInput() {

    const store = useStore()
    const STORE = store.state.Input
    const inputId   = 'questInput'


    // -- Get input str
    const setInputStr = (task = '', clear = false) => {
        clear && document.getElementById(inputId) && (document.getElementById(inputId).innerText = '_')
        return task.replace('_', `<span id="${inputId}">_</span>`)
    }



    // -- Add symbol to input area

    const addInput = (symbol) => {

        const $questInput = document.getElementById(inputId)

        if (!$questInput?.innerText.length || $questInput.innerText.length >= STORE.maxAnswerLen)
            return false

        $questInput.innerHTML = $questInput.innerHTML === '_' ? symbol : $questInput.innerHTML + symbol
        store.commit('Input/setInputArea', $questInput.innerHTML)
    }



    // -- Delete symbol or all symbols from input area

    const deleteInput = (all = false) => {

        const $questInput = document.getElementById(inputId)

        if(!$questInput || $questInput.innerHTML.length === 0)
            return

        let newInput = all ? '' : $questInput.innerHTML.substring(0, $questInput.innerHTML.length - 1)
        newInput = newInput === '' ? '_' : newInput

        $questInput.innerHTML = newInput
        store.commit('Input/setInputArea', newInput)
    }



    return {
        buttonsModel : [1,2,3,4,5,6,7,8,9,'-',0,'del'],
        // inputArea : computed(() => STORE.inputArea),
        // taskArea : computed(() => STORE.taskArea),
        inputId,

        setInputStr,
        addInput,
        deleteInput,
    }

}
