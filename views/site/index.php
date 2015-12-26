<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Главная';
?>

<!-- Intro Header -->
<header class="intro" style="height: 600px;">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="">
                    <h1 class="brand-heading" style="text-transform: none; font-size: 300%;">Авиалинии БогДан</h1>
                    <p class="intro-text" style="margin-bottom: 10px;">Представляют проект</p>
                    <h1 class="brand-heading" style="text-transform: none;margin-top: 0px;">Крылья Ангела</h1>
                    <p class="intro-text">Мы исполняем мечты! Летайте как птицы!</p>
<!--                    <a href="#about" class="btn btn-circle page-scroll">-->
<!--                        <i class="fa fa-angle-double-down animated"></i>-->
<!--                    </a>-->
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
            <h2 class="text-center">О проекте</h2>

            <p><img src="/images/controller/site/index/10408693_10153724707772888_1233079936717193229_n.jpg" width="100%"></p>
            <p>Проект Крылья Ангела представляет собой тренажер для полетов в виртуальной реальности вместе с кристальным звуком. По факту этот тренажер является персональным кинотеатром 5D</p>
            <p>Он будет установлен в Москве в марте-мае 2016 г. и стоять в одном из торговых центров Москвы</p>
            <p>Для того чтобы испытать этот тренажер вам нужно получить билет</p>
            <p>Получая билет вы получите:<br>
                - 30 мин первокласного ощущения полета на Крыльях Ангела<br>
                - измененное состояние сознания легкости после полета<br>
                - эффект присутствия через зрение, слух, гравитацию, ощущение ветра<br>
                - фото вашего полета на память<br>
                - купон на скидку для вас и ваших друзей<br>
                - специальный подарок!
            </p>
            <p><iframe width="100%"
                       height="315" src="https://www.youtube.com/embed/gWLHIusLWOc" frameborder="0" allowfullscreen></iframe></p>

            <p>Этот симулятор Birdly<sup>®</sup> разработан компанией <a href="http://somniacs.co/" target="_blank">Somniacs</a></p>

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
                <h2>Попробовать</h2>
                <p>Один билет равен 1 000 благодарностей (руб.) в наш адрес<br>Получить билет вы можете на сайте Boomstarter.ru</p>
                <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">Перейти на Boomstarter</a>
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
                <a href="mailto:feedback@startbootstrap.com">avia@galaxysss.ru</a>
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

