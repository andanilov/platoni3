<template>

<head-page title="История занятий"></head-page>

<wrapper-page :currentUser="currentUser">
    <div class="px-2">

        <message class="z-50"
        v-if="!currentUser"
        type="info"
        title="Авторизируйтесь!">
            Чтобы получить доступ ко всем занятиям и сохранять прогресс, зарегестрируйтесь и войдите!
        </message>

        <message class="z-50"
        v-else-if="!history.length"
        type="info"
        title="История занятий">
            Пройдите первый тест, чтобы начать историю!
        </message>

        <table class="w-full text-center mt-5"
        v-else>

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
                    <td class="text-[.8em] py-2">{{ useDateText(row.created) }}</td>
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
import { useDateText } from '@/use/DateText'
import WrapperPage from '@/components/WrapperPage.vue'
import Message from '@/components/Message'
import HeadPage from '@/components/HeadPage'

// -- Get and update current user
const currentUser = ref(computed(() => useGetUser(props.user)))
computed(() => { useGetUser(props.user) })


const props = defineProps({
    user : Object,
    history: Object
})

let history = []

// -- Get history for user (no guest)
history = computed(() => useSort(props.history.original, 'created'))


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



</script>
