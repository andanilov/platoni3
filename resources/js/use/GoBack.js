import { useStore } from "vuex";

export function useGoBack() {

  const store = useStore()
  const STORE = store.state.GoBack

  const addToQueue = (fn) => !STORE.fnQueue.includes(fn) && store.commit('GoBack/setFnQueue', [...STORE.fnQueue, fn])

  const clearQueue = () => store.commit('GoBack/setFnQueue', [])

  const execQueue = () => STORE.fnQueue.forEach((fn) => fn())

  !window.onpopstate && (window.onpopstate = function () {
    execQueue();
    clearQueue();
    window.onpopstate = null;
  })

  return { addToGoBackQueue: addToQueue }
}
