<template>
    <div class="container">
        <div class="card product">
            <div class="product_name">
                <p>{{this.prod['Name']}}</p>
            </div>
            <div class="product_image">
                <img :src="'/assets/img/'+this.prod['Type']+'/'+this.prod['Image']" alt="">
                <div class="product_price">
                    <p>{{this.prod['Price']}} рублей</p>
                    <button class="btn btn-success" @click="addtocard">Добавить в корзину</button>
                    <div class="product_desc">
                        <p v-html="this.prod['Desc'].replaceAll('_x000D_','')"></p>
                    </div>
                </div>
            </div>



        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            prod: [],
            id: this.$route.params.id
        }
    },
    methods: {
        unsub(type) {
            let data = {
                'id':this.id,
            };
            axios.post('/api/get-one',data)
                .then(({data}) => {
                    this.prod = data[0];
                    console.log(data);
                })
        },
        addtocard() {
            let cardLoad = localStorage.card;
            if(!JSON.stringify(cardLoad)) {
                let newCard = [];
                let item = {};
                item['id'] = this.id;
                newCard.push(item);
                console.log(JSON.stringify(newCard));
                localStorage.card = JSON.stringify(newCard);
            } else {
                let item = {};
                item['id'] = this.id;
                let result = jQuery.parseJSON(localStorage.card);
                result.push(item);
                localStorage.card = JSON.stringify(result);
            }
            console.log(JSON.stringify(cardLoad));
        }

    },
    mounted() {
        this.unsub(this.loadType)
    }
}
</script>

<style scoped>

</style>
