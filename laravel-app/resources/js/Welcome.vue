<template>
    <div class="b_container">
        <div class="b_search">
            <input type="search" placeholder="Поиск по продуктам" class="b_search_input" v-model="search">
            <button class="btn btn-primary" @click="call_api">Найти</button>
        </div>
        <h3>Укажите тип поиска:</h3>
        <div class="search_type">
            <div class="form-check">
                <input class="form-check-input" type="radio" value="name" v-model="search_type" id="flexCheckDefault" checked  name="radio">
                <label class="form-check-label" for="flexCheckDefault">
                    Название
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="code" v-model="search_type" id="flexCheckChecked"  name="radio">
                <label class="form-check-label" for="flexCheckChecked">
                    Код
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" v-model="search_type" value="color" id="b_code" name="radio">
                <label class="form-check-label" for="b_code">
                    Цвет
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" v-model="search_type" value="size" id="b_size" name="radio">
                <label class="form-check-label" for="b_size">
                    Размер
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" v-model="search_type" value="description" id="b_description" name="radio">
                <label class="form-check-label" for="b_description">
                    Описание
                </label>
            </div>
            <div class="b_price form-check">
                <input class="form-check-input" type="radio" v-model="search_type" value="price" id="b_price" name="radio">
                <label class="form-check-label" for="b_price">&nbsp;
                    Цена
                </label>&nbsp;
                от&nbsp;<input type="number" class="b_price_from" v-model="price_from">&nbsp;
                до&nbsp;<input type="number" class="b_price_from" v-model="price_to">&nbsp;
            </div>
        </div>

        <div class="d-flex justify-content-center" v-if="spinner">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
        </div>


        <div class="search_data" v-if="products">
            <h3>По вашему запросу найдено <b>{{products.length}} </b> записей</h3>
            <div v-for="item in products">
                <product-item :product="item"/>
            </div>
        </div>

    </div>
</template>

<script>
import axios from "axios";
import ProductItem from "./components/ProductItem.vue";

export default {
    components: {ProductItem},
    data() {
        return {
            active: true,
            products: '',
            search: '',
            search_type: 'name',
            spinner: false,
            price_from: '',
            price_to: '',
        }
    },
    methods: {
        call_api() {
            this.products = '';
            this.spinner  = true;
            axios.post("/api/search", null, { params: {
                    "search": this.search, 'type': this.search_type,
                    'from': this.price_from, 'to': this.price_to
                }})
                .then(response => {
                    console.log(response);
                    this.spinner = false;
                    if(response.data.product) {
                        this.products = response.data.product.slice(0);
                    }
                });
        }
    }

}
</script>

<style>
.form-check {
    min-width: 120px;
}
.search_type {
    display: flex;
    flex-wrap: wrap;
}
.search_data {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.b_price {
    display: flex;
    flex-wrap: wrap;

}
.b_price_from {
    width: 70px;
}

.b_container {
    padding: 100px 0;
    width: 600px;
    margin: 0 auto;
}
.b_search {
    display: flex;
}
.b_search_input {
    width: 80%;
}

.main-search-input {
    background: #fff;
    padding: 0 120px 0 0;
    border-radius: 1px;
    margin-top: 200px;
    box-shadow: 0px 0px 0px 6px rgba(255, 255, 255, 0.3);
}

.fl-wrap {
    float: left;
    width: 100%;
    position: relative;
}

.main-search-input-item {
    float: left;
    width: 100%;
    box-sizing: border-box;
    border-right: 1px solid #eee;
    height: 50px;
    position: relative;
}


.main-search-input-item input {
    float: left;
    border: none;
    width: 100%;
    height: 50px;
    padding-left: 20px;
}

.main-search-button {

    background: #4DB7FE;
}

.main-search-button {
    position: absolute;
    right: 0px;
    height: 50px;
    width: 120px;
    color: #fff;
    top: 0;
    border: none;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    cursor: pointer;
}

.main-search-input-wrap {
    max-width: 500px;
    margin: 20px auto;
    position: relative;
}

:focus {
    outline: 0;
}


@media only screen and (max-width: 768px) {
    .main-search-input {
        background: rgba(255, 255, 255, 0.2);
        padding: 14px 20px 10px;
        border-radius: 10px;
        box-shadow: 0px 0px 0px 10px rgba(255, 255, 255, 0.0);
    }

    .main-search-input-item {
        width: 100%;
        border: 1px solid #eee;
        height: 50px;
        border: none;
        margin-bottom: 10px;
    }

    .main-search-input-item input {
        border-radius: 6px !important;
        background: #fff;
    }

    .main-search-button {
        position: relative;
        float: left;
        width: 100%;
        border-radius: 6px;
    }
}
</style>
