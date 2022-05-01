const Quests = {

    namespaced: true,

    state: () => ({
        questsLevelsMap : {test : 'test'}
    }),

    mutations : {
        setQuestsLevelsMap : (state, newVal) => { state.questsLevelsMap = newVal }
    },

}

export default Quests
