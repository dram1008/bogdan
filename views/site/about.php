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
            <p>Компания предоставляет людям новую технологию перелетов в пространстве при помощи «Крыльев Ангела».<br>
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
                <h2>Наши контакты</h2>
                <p>+7-925-237-45-01<br>+7-926-518-98-75</p>
                <p>
                    <a href="mailto:avia@galaxysss.ru" style="color: #000000;">avia@galaxysss.ru</a>
                </p>
            </div>
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
                'image'       => \yii\helpers\Url::to('/images/controller/site/about/share.jpg', true),
                'title'       => 'Авиалинии БогДан',
                'description' => 'Компании предоставляет людям новую технологию перелетов в пространстве при помощи «Крыльев Ангела».
                Компания включает школу по обучению, Институт Многомерной Медицины, Институт Квантовой Генетики и технологии виртуальной реальности.
                Также предоставляет перелеты на обычных самолетах. Отличительным знаком компании является Крылья Ангела.',
            ]) ?>



        </div>
    </div>
</section>

