<template>
    <div class="container">
        <div class="row" v-if="loading">
            <div style="display: flex; justify-content: center;">
                <img style="margin-top: 100px;width: 50px;" src="/assets/img/loading.gif" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="accordion" style="margin-top: 20px" id="accordionExample">
                    <div class="accordion-item" v-for="menu_item in menu">
                        <h2 class="accordion-header" :id="'heading'+menu_item.id">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+menu_item.id" aria-expanded="false" :aria-controls="'collapse'+menu_item.id">
                                {{menu_item.name}}
                            </button>
                        </h2>
                        <div :id="'collapse'+menu_item.id" class="accordion-collapse collapse" :aria-labelledby="'heading'+menu_item.id" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div v-for="child_item in menu_item.childs" @click="unsub(child_item.key)">
                                    <router-link style="text-decoration: none; color:black;" :to="{name:'catalog', params:{type:child_item.key}}">{{child_item.name}}</router-link>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="row" style="margin-top:20px;">
                        <input class="search" v-model="searcher" type="text" placeholder="Поиск" style="width: 90%;">
                        <button style="width: 10%;" class="btn btn-success search_btn"@click="search"></button>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="sort block">
                            Сортировать по: <a @click="sorta('Price')">Цене по возрастанию</a><a @click="sortb('Price')">Цене по убыванию</a><a @click="sorta('Name')">Названию </a><a>Рейтингу </a>
                        </div>
                    </div>
                    <div class="items row">
                        <div class="col-md-3" style="margin-top: 20px;" v-for="item in top">
                            <router-link style="text-decoration: none;" :to="{name:'product',params: {id:item.id}}"><div class="card h-100">
                                <a class="card_item" href="shop-single.html">
                                    <img  :src="'/assets/img/'+item.Type+'/'+item.Image" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="shop-single.html" class="h4 text-decoration-none text-dark">{{item.Name}}</a>
                                    <p style="color:red" v-if="item.Price == 'Нет в наличии'">Нет в наличии</p>
                                    <p style="color: grey;" v-else>{{item.Price}}<span> рублей</span></p>
                                </div>
                                <div class="card-footer">
                                    <button style="width:100%" class="btn btn-success">Купить</button>
                                </div>
                            </div></router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" @click="loadPrev" href="#">Prev</a>
                </li>
                <li class="page-item">
                    <a class="page-link" @click="loadNext" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            top: [],
            id:1,
            prev: '',
            next: '',
            menu: [],
            loadType: this.$route.params.type,
            loading: true,
            searcher: '',
            sort:'',
        }
    },
    methods: {
        unsub(type) {
            let data = {
                'type':type,
                'page':'1',
            };
            axios.post('/api/get',data)
                .then(({data}) => {
                    this.top = data['data'];
                    console.log(data);
                    this.id = data['current_page'];
                    this.loadType = type;
                })
                .finally(() => {
                    this.loading = false
                })
        },
        sorta(type) {
            let data = {
                'type':this.loadType,
                'page':'1',
                'sort':type
            };
            axios.post('/api/getSort',data)
                .then(({data}) => {
                    this.top = data['data'];
                    console.log(data);
                    this.id = data['current_page'];
                })
                .finally(() => {
                    this.loading = false
                })
        },
        sortb(type) {
            let data = {
                'type':this.loadType,
                'page':'1',
                'sort':type
            };
            axios.post('/api/getSortb',data)
                .then(({data}) => {
                    this.top = data['data'];
                    console.log(data);
                    this.id = data['current_page'];
                })
                .finally(() => {
                    this.loading = false
                })
        },
        search() {
            let data = {
                'request':this.searcher,
                'page':this.$route.params.type
            };
            axios.post('/api/search',data)
                .then(({data}) => {
                    console.log(this.$route.params.type);
                    this.top = data;
                })
        },
        loadPrev() {
            let data = {
                'type':this.loadType,
                'page':this.id - 1
            };
            axios.post('/api/get',data)
                .then(({data}) => {
                    this.top = data['data'];
                    console.log(data);
                    this.id = data['current_page'];
                })
        },
        loadNext() {
            let data = {
                'type':this.loadType,
                'page':this.id +1
            };
            axios.post('/api/get',data)
                .then(({data}) => {
                    this.top = data['data'];
                    console.log(data);
                    this.id = data['current_page'];
                })
        },
        loadMenu() {
            axios.post('/api/menu')
                .then(({data}) => {
                    console.log(data);
                    this.menu = data;
                })
        }
    },
    mounted() {
        this.unsub(this.loadType)
        console.log(this.$route.params.type);
        this.loadMenu();
    }
}
</script>

<style scoped>

</style>
