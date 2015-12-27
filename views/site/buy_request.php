<?php

/* @var $this yii\web\View */
/* @var $model \cs\base\BaseForm */
/* @var $id int */

$this->title = 'Заказ. шаг 2';
?>



<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Шаг 2</h2>

            <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
                <input type="hidden" name="receiver" value="410011473018906">
                <input type="hidden" name="formcomment" value="Проект «Железный человек»: реактор холодного ядерного синтеза">
                <input type="hidden" name="short-dest" value="Проект «Железный человек»: реактор холодного ядерного синтеза">
                <input type="hidden" name="label" value="1231">
                <input type="hidden" name="quickpay-form" value="donate">
                <input type="hidden" name="targets" value="транзакция {1231}">
                <input type="hidden" name="sum" value="20" data-type="number">
                <input type="hidden" name="comment" value="Хотелось бы дистанционного управления.">
                <input type="hidden" name="need-fio" value="true">
                <input type="hidden" name="need-email" value="false">
                <input type="hidden" name="need-phone" value="false">
                <input type="hidden" name="need-address" value="false">
                <label><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>
                <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>
                <input type="submit" value="Перевести">
            </form>
        </div>
    </div>
</section>


<!-- Download Section -->
<section id="download" class="content-section text-center">
    <div class="download-section" style="
    border-bottom: 1px solid #87aad0;
    border-top: 1px solid #87aad0;
    ">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2" style="color: #000000">
                <p class="text-center"><img src="/images/icon.png" class="img-center"></p>

                <h2>Попробовать</h2>

                <p>Один билет равен 1 000 благодарностей (руб.) в наш адрес</p>
                <a href="/price" class="btn btn-default btn-lg">Получить билет</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Наши контакты</h2>

            <p>+7-925-237-45-01<br>+7-926-518-98-75</p>

            <p>
                <a href="mailto:avia@galaxysss.ru">avia@galaxysss.ru</a>
            </p>

        </div>
    </div>
</section>

