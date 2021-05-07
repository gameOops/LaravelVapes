<template>
    <div>
        <div class="container-fluid bg-light py-5">
            <div class="col-md-6 m-auto text-center">
                <h1 class="h1">Контакты</h1>
                <p>
                    Рязань, ул. Грибоедова дом 9, кв. 50. В домофон сказать что пришли за жижкой)
                </p>
            </div>
        </div>

        <!-- Start Map -->
        <div id="mapid" style="width: 100%; height: 300px;">
            <script type="application/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac7c1d403012efd01a6c98b597a64bcff3e070d95f7abb91a20993e456c34436c&amp;width=100%25&amp;height=328&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <!-- Ena Map -->

        <!-- Start Contact -->
        <div class="container py-5">
            <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <h1 class="h1">Напиши нам</h1>
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputname">Имя</label>
                            <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Имя">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputemail">Email</label>
                            <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputsubject">Тема</label>
                        <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Тема">
                    </div>
                    <div class="mb-3">
                        <label for="inputmessage">Сообщение</label>
                        <textarea class="form-control mt-1" id="message" name="message" placeholder="Сообщение" rows="8"></textarea>
                    </div>
                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" class="btn btn-success btn-lg px-3">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Contact"
}
</script>

<style scoped>

</style>
