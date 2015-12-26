<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'О нас';
?>

<!-- Intro Header -->
<header class="intro" style="height: 600px; background: url('/images/controller/site/about/img.jpg')  no-repeat top scroll;">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="">
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
            <h2 class="text-center">О нас</h2>

            <p class="text-center"><img src="/images/controller/site/about/img2.jpg" height="400" class="img-center"></p>
            <p>Основателем компании является человек обладающий колосальными знаниями и опытом полетов в том числе и знание своих прошлых жизней где он ранее летал. В этой жизни он решил сделать людям подарок в виде предоставления технологии полетов. Проект Крылья Ангела и является стартом такой манифестации.</p>
            <p>Компании предоставляет людям новую технологию перелетов в пространстве при помощи «крыльев ангела».<br>
                Компания включает школу по обучению, Институт Многомерной Медицины, Институт Квантовой Генетики и технологии виртуальной реальности.<br>
                Также предоставляет перелеты на обычных самолетах. Отличительным знаком компании является Крылья Ангела.</p>
            <p>Также разрабатывает и продает летающие автомобили (особая секретная технология основнная на принципах антигравитации). Эта информация доступна только, тем кто принял <a href="http://teslagen.org/video" target="_blank">условия соглашения и вступил на Новую Землю</a></p>

            <p>Наши партнеры:<br>
            <a href="http://www.jetman.com/">http://www.jetman.com/</a>&nbsp;- полет в реальной жизни с реактивным двигателем<br>

            <a href="http://somniacs.co/" target="_blank">http://somniacs.co/</a>&nbsp;- Полет на аттракционе в Виртуальной Реальности</p>
            <p><iframe allowfullscreen="" frameborder="0" height="315" src="https://www.youtube.com/embed/_VPvKl6ezyc" width="100%"></iframe></p>

            <p><iframe allowfullscreen=""  frameborder="0" height="315" src="https://www.youtube.com/embed/gWLHIusLWOc" width="100%"></iframe></p>

            <p class="text-center"><img alt="" src="/images/controller/site/about/1450076809_j6zweTIc7L.jpg" style="width: 100%; max-width: 500px;" class="img-center"></p>
            <p><iframe allowfullscreen=""  frameborder="0" height="315" src="https://www.youtube.com/embed/P8ZDQ3fPVOA" width="100%"></iframe></p>

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

