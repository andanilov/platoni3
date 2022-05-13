<template>

<wrapper-page :currentUser="currentUser">
    <div class="px-2 pt-5">

        <table class="w-full text-center">

            <thead class="text-[.7em] border-b-stone-200 border-b-2">
                <tr>
                    <th class="cursor-pointer" @click="srt('created');">
                        Дата <span class="text-[.8em]">{{ currentSort === 'created' ? ( sortTypes['created'] && '&#9660;' || '&#9650;') : '&nbsp;&nbsp;' }}</span>
                    </th>
                    <th class="cursor-pointer" @click="srt('all');">
                        Задания <span class="text-[.8em]">{{ currentSort === 'all' ? ( sortTypes['all'] && '&#9660;' || '&#9650;') : '&nbsp;&nbsp;' }}</span>
                    </th>
                    <th class="cursor-pointer" @click="srt('corrects');">
                        Примеры <span class="text-[.8em]">{{ currentSort === 'corrects' ? ( sortTypes['corrects'] && '&#9660;' || '&#9650;') : '&nbsp;&nbsp;' }}</span>
                    </th>
                    <th class="cursor-pointer" @click="srt('level');">
                        Сложность <span class="text-[.8em]">{{ currentSort === 'level' ? ( sortTypes['level'] && '&#9660;' || '&#9650;') : '&nbsp;&nbsp;' }}</span>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b-stone-200 border-b-[1px]"
                v-for="row in history"
                :key="row.created">
                    <td class="text-[.8em] py-2">{{ row.created }}</td>
                    <td>
                        <span class=" text-lime-600">{{ row.win }}</span>
                        <span class="text-[.8em]"> / </span>
                        <span class="text-[.9em] text-red-500">{{ row.all - row.win }}</span>
                    </td>
                    <td>
                        <span class="text-lime-600">{{ row.corrects }}</span>
                        <span class="text-[.8em]"> / </span>
                        <span class="text-[.9em] text-red-500">{{ row.mistakes }}</span>
                    </td>
                    <td>
                        <span class="">{{ Math.trunc(row.level) }}</span>
                        <span class="">{{ Number(row.level.split('.')[1]) ? `.${row.level.split('.')[1].slice(0,2)}` : '' }}</span>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</wrapper-page>

</template>

<script setup>
import { computed, ref } from 'vue'
import { useGetUser } from '@/use/GetUser.js'
import { useSort } from '@/use/Sort.js'
import WrapperPage from '@/components/WrapperPage.vue'

const props = defineProps({
    user : Object,
    history: Object
})

let history = useSort(props.history.original, 'created')

// -- Sorting
const sortTypes = {
    created : false,
    all : true,
    corrects : true,
    level : true,
}
let currentSort = ref('created')
const srt = (col) => {
    history = useSort(history, col, (sortTypes[col] = !sortTypes[col]))
    currentSort.value = col
}

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })
</script>
