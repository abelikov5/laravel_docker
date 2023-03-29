<template>
    <div class="b_container">
        <div class="b_search">
            <input type="search" placeholder="Поиск по продуктам" class="b_search_input">
            <button class="btn btn-primary">Найти</button>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
            <label class="form-check-label" for="flexCheckDefault">
                Название
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
            <label class="form-check-label" for="flexCheckChecked">
                Код
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="b_code">
            <label class="form-check-label" for="b_code">
                Цвет
            </label>
        </div>
        <div class="b_price">
            <input class="form-check-input" type="checkbox" value="" id="b_price">
            <label class="form-check-label" for="b_price">
                Цена
            </label>
            от <input type="number" class="b_price_from">
            до <input type="number" class="b_price_from">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="b_size">
            <label class="form-check-label" for="b_size">
                Размер
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="b_description">
            <label class="form-check-label" for="b_description">
                Описание
            </label>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            active: true,
        }
    },

}
</script>

<style>
.b_price {
    display: flex;

}
.b_price_from {
    width: 40px;
}

.b_container {
    padding: 100px 0;
    width: 400px;
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
