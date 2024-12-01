<script setup>
import {ref, reactive, onMounted} from 'vue'
import {VueSpinner} from 'vue3-spinners'

const keys = ['city', 'name', 'digit', 'email', 'float', 'phone', 'number', 'address', 'company', 'country_code']
const search = reactive([])
const data = ref([])
const loading = ref(false)

onMounted( () => getData() )

function searchPush() {
    search.push({
        key: '',
        value: '',
    })
}

function searchPop() {
    search.pop()
    getData()
}

async function getData() {
    loading.value = true;

    const response = await axios.get('records', {
        params: {search},
    })

    loading.value = false;
    data.value = response.data;
}
</script>

<template>
    <div id="spinner">
        <VueSpinner size="20" color="red" v-show="loading"/>
    </div>

    <table id="data" v-if="data.length">
        <tr>
            <th>Id</th><th>Access</th><th>Data</th>
        </tr>
        <tr v-for="item in data" :key="item.id">
            <td>{{item.id}}</td><td>{{item.access}}</td><td>{{item.data}}</td>
        </tr>
    </table>
    <div v-else>
        Список пуст. Проверьте параметры поиска.
    </div>

    <hr>

    <button @click="searchPush">Добавить условие</button>
    <button @click="searchPop">Удалить последнее условие</button>
    <button @click="getData">Получить</button>

    <table id="search">
        <tr>
            <th>Key</th><th>Value</th>
        </tr>
        <tr v-for="(item, index) in search" :key="index">
            <td>
                <select v-model="item.key">
                    <option disabled value="">Выберите ключ</option>
                    <option v-for="value in keys">{{value}}</option>
                </select>
            </td>
            <td>
                <input v-model="item.value" placeholder="отредактируй меня" />
            </td>
        </tr>
    </table>
</template>
