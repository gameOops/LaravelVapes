<template>
<div class="container box">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in cart">
            <th scope="row">{{ item[0]['id'] }}</th>
            <td>{{ item[0]['Name'] }}</td>
            <td>1</td>
            <td>{{ item[0]['Price'] }} ₽</td>
        </tr>
        </tbody>
    </table>
    <br>
    <div style="text-align: right"><p style=" font-size: 27px!important;">Итого: {{ this.allPrice }} ₽</p></div>
    <div style="text-align: right">
        <button class="btn btn-danger">Отчистить корзину</button>
        <button class="btn btn-success">Оформить заказ</button>
    </div>

</div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            top: [],
            cart: [],
            allPrice:0
        }
    },
    methods: {
        unsub(type) {

            let count = this.top.length;
            for(let b = 0; b<count; b++) {
                let data = {
                    'id':this.top[b]['id'],
                };
                axios.post('/api/get-one',data)
                    .then(({data}) => {
                        console.log(data);
                        this.allPrice = parseInt(this.allPrice) + parseInt(data[0]['Price'])
                        this.cart.push(data);
                        console.log(this.cart)
                    })
            }

        }
    },
    mounted() {
        this.top = JSON.parse(localStorage.card)
        this.unsub()

    }
}
</script>

<style scoped>

</style>
