<template>
    <div class="prod_container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <b> id:</b>         {{product.id}} <br>
                        <b> Название:</b>   {{product.name}} <br>
                        <b> Цена:</b>       {{product.price}} <br>
                        <b> Код:</b>        {{product.code}} <br>
                        <b> Цвет:</b>       {{product.color}} <br>
                    </div>
                    <div class="card-body">
                        <b>Размер:</b>   {{product.size}} <br>
                        <b>Описание:</b> {{product.description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['product'],
    created() {

    }
}
</script>

<style>
.prod_container {
    width: 280px;
    min-height: 200px;
    margin-top: 20px;
}

</style>
