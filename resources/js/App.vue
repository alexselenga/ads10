<script setup>
import {reactive} from 'vue'

const keys = ['city', 'name', 'digit', 'email', 'float', 'phone', 'number', 'address', 'company', 'country_code']

const search = reactive([
    {
        key: "digit",
        value: 4
    },
    {
        key: "city",
        value: "Ernserhaven"
    },
])

const data = reactive([
    {
        "id": 21,
        "data": "{\"city\": \"Opalstad\", \"name\": \"Dr. Shaylee Doyle III\", \"digit\": 4, \"email\": \"trantow.jayden@mccullough.com\", \"float\": 677919.35983259, \"phone\": \"469.365.5434\", \"number\": 818219, \"address\": \"55086 Armstrong Locks Apt. 664\\nRuperttown, WI 55312\", \"company\": \"Schuppe, Stracke and Shields\", \"country_code\": \"GS\"}",
        "access": 0,
        "created_at": "2024-11-28T13:00:13.000000Z",
        "updated_at": "2024-11-28T13:00:13.000000Z"
    },
    {
        "id": 22,
        "data": "{\"city\": \"Ernserhaven\", \"name\": \"Deontae Becker\", \"digit\": 2, \"email\": \"zoe58@gmail.com\", \"float\": 4473672.7821549, \"phone\": \"+14704800456\", \"number\": 392, \"address\": \"12211 Paul Fort Apt. 245\\nWest Lisandro, NY 74232-7353\", \"company\": \"Rosenbaum Inc\", \"country_code\": \"TF\"}",
        "access": 1,
        "created_at": "2024-11-28T13:00:13.000000Z",
        "updated_at": "2024-11-28T13:00:13.000000Z"
    },
    {
        "id": 25,
        "data": "{\"city\": \"Zboncakside\", \"name\": \"Thad Cartwright\", \"digit\": 4, \"email\": \"fjacobi@gmail.com\", \"float\": 90187, \"phone\": \"(615) 691-7755\", \"number\": 910, \"address\": \"618 Troy Drive\\nMaxwellshire, AZ 14056\", \"company\": \"Gutkowski, Gutkowski and Hudson\", \"country_code\": \"NC\"}",
        "access": 0,
        "created_at": "2024-11-28T13:00:13.000000Z",
        "updated_at": "2024-11-28T13:00:13.000000Z"
    },
    {
        "id": 30,
        "data": "{\"city\": \"Port Justice\", \"name\": \"Marcos Daniel\", \"digit\": 4, \"email\": \"eichmann.tabitha@yahoo.com\", \"float\": 5959674, \"phone\": \"+1-936-814-3933\", \"number\": 1629963, \"address\": \"57567 Serena Viaduct Suite 262\\nHelgaton, SD 36915\", \"company\": \"Will-Kuvalis\", \"country_code\": \"MY\"}",
        "access": 1,
        "created_at": "2024-11-28T13:00:13.000000Z",
        "updated_at": "2024-11-28T13:00:13.000000Z"
    },
])

function searchPush() {
    search.push({
        key: '',
        value: '',
    })
}

function getData() {
//
}

function searchPop() {
    search.pop()
}
</script>

<template>
    <table>
        <tr>
            <th>Id</th><th>Access</th><th>Data</th>
        </tr>
        <tr v-for="item in data" :key="item.id">
            <td>{{item.id}}</td><td>{{item.access}}</td><td>{{item.data}}</td>
        </tr>
    </table>
    <hr>
    <button @click="searchPush">Добавить условие</button>
    <button @click="searchPop">Удалить условие</button>
    <button @click="getData">Получить</button>
    <table>
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
