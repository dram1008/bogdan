<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Планета «Новая Земля»';
?>

<!-- Intro Header -->
<header class="intro" style="height: 400px; background: url('/images/controller/products/planet/4.jpg')  no-repeat top scroll;">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- About Section -->
<section id="about" class="container content-section">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center" style="text-transform: none;"><span style="font-size: 70%;">Планета</span><br>«Новая Земля»</h2>

            <p class="text-center"><img src="/images/controller/products/planet/globus.jpg" style="width: 100%; max-width: 600px; border-radius: 20px;" class="img-center"></p>
            <p>Планета «Новая Земля» является прототипом Новой Земли, которая сейчас проявляется на Земле. На планету нанесены в виде кристаллов две лей линии и 12 планетарных чакр за исключением 6 чакры которая не имеет фиксированного расположния.</p>
            <p class="text-center"><img src="/images/controller/products/planet/3.jpg" style="width: 100%; max-width: 600px; border-radius: 20px;" class="img-center"></p>
            <p>Оформлена в виде глобуса 30 см в диаметре.<br>
            Поставляется с подставкой.</p>

            <p class="text-center"><img src="/images/controller/products/planet/1444980126_XlhMUkP7z3.jpg" style="width: 100%; max-width: 800px; border-radius: 20px;" class="img-center"></p>
            <p><b>Две великие лей-артерии Дракона</b></p>
            <p>Распределение энергий чакр по всему миру выполняется в основном по лей линиям или теллурическим энергетическим артериям. На карте мира две основные лей артерии – Женский Радужный Змей и Мужской Пернатый Змей – формируют знак бесконечности, двойную спираль. Эти потоки соединяют все постоянные чакры Земли, за исключением горловой чакры, из-за ее уникального расположения.</p>
            <p><a href="http://www.galaxysss.ru/newEarth/chakri" target="_blank">Посмотреть подробнее описание</a></p>

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

