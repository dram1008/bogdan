<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Защитный Амулет на Автомобиль';
?>

<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Защитный Амулет на Автомобиль</h2>

            <p class="text-center"><img src="/images/controller/products/car_keeper/car.jpg" style="width: 100%; max-width: 400px;border-radius: 20px;" class="img-center"></p>
            <p>Предназначен для размещения на лобовом стекле автомобиля. Размер 10х15см.</p>
            <p>Поставляется совместно с тремя наклейками-голограммами. Одна спереди (с защитным покрытием). Одна сзади (с защитным покрытием). Одна внутри. Размер 10 см в диаметре.</p>
            <p class="text-center"><img src="/images/controller/products/car_keeper/holo.png" style="width: 100%; max-width: 400px;" class="img-center"></p>


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
                <p class="text-center"><img src="/images/icon.png" class="img-center"> </p>
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

<!-- share Section -->
<section id="share" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Поделиться</h2>
            <?= $this->render('../blocks/share', [
                'url'         => \yii\helpers\Url::current([], true),
                'image'       => \yii\helpers\Url::to('/images/promo-facebook1.jpg', true),
                'title'       => 'Проект «Крылья Ангела». Летайте как птицы! Получите билет от нас в подарок!',
                'description' => 'Проект Крылья Ангела представляет собой тренажер для полетов в виртуальной реальности вместе с кристальным звуком. По факту этот тренажер является персональным кинотеатром 5D.

Он будет установлен в Москве в марте-мае 2016 г. и стоять в одном из торговых центров Москвы.

Для того чтобы испытать этот тренажер вам нужно получить билет.

Получая билет вы получите:
- 30 мин первокласного ощущения полета на Крыльях Ангела;
- измененное состояние сознания легкости после полета;
- эффект присутствия через зрение, слух, гравитацию, ощущение ветра;
- фото вашего полета на память;
- купон на скидку для вас и ваших друзей;
- специальный подарок!',
            ]) ?>



        </div>
    </div>
</section>

