import { useStore } from 'vuex'
import { onMounted } from 'vue'

export function useQuestInput() {

    const store = useStore()
    const task = store.state.Quest.currentTask.task



    // const addInput = (symbol) => {

    //     const $questInput = document.getElementById('questInput')

    //     $questInput.innerHTML = $questInput.innerHTML === '_' ? symbol : $questInput.innerHTML + symbol
    //     store.commit('Quest/setInputArea', $questInput.innerHTML)
    // }


    // const deleteInput = (all = false) => {

    //     const $questInput = document.getElementById('questInput')

    //     if($questInput.innerHTML.length === 0)
    //         return

    //     let newInput = all ? '' : $questInput.innerHTML.substring(0, $questInput.innerHTML.length - 1)
    //     newInput = newInput === '' ? '_' : newInput

    //     $questInput.innerHTML = newInput
    //     store.commit('Quest/setInputArea', newInput)
    // }


    return {
        // inputStr: task.replace('_', '<span id="questInput">_</span>'),
        // addInput,
        // deleteInput,

        // buttonsModel : [1,2,3,4,5,6,7,8,9,'.',0,'del']
    }

}
