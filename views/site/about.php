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
            <h2 class="text-center">О нас<br>Авиалинии БогДан</h2>

            <p>Основателем компании является человек именуемый БогДан, обладающий колосальными знаниями и опытом полетов в том числе и знание своих прошлых жизней где он ранее летал. В этой жизни он решил сделать людям подарок в виде предоставления технологии полетов. Проект Крылья Ангела и является стартом такой манифестации.</p>
            <p>Компания «Авиалинии БогДан» является полноправным представителем Бога на планете Земля и одной из ее владельцев.</p>
            <p><img src="/images/controller/site/about/1450666172_9RAcQICogZ.jpg" style="width: 100%;max-width: 800px;border-radius: 10px;" ></p>
            <p>Компания предоставляет людям новую технологию перелетов в пространстве при помощи «Крыльев Ангела».<br>
                Компания включает школу по обучению, <a href="http://www.galaxysss.ru/category/medical/344" target="_blank">Институт Многомерной Медицины</a>, <a href="http://www.galaxysss.ru/category/medical/166" target="_blank">Институт Квантовой Генетики</a> и технологии виртуальной реальности.<br>
                Также предоставляет перелеты на обычных самолетах. Отличительным знаком компании является «Крылья Ангела».</p>
            <p>Также разрабатывает и продает летающие автомобили (особая секретная технология основанная на принципах антигравитации). Эта информация доступна только, тем кто принял <a href="http://teslagen.org/video" target="_blank">условия соглашения и вступил на Новую Землю</a></p>

            <p>Наши партнеры:<br>
            <a href="http://www.i-am-avatar.com/" target="_blank">www.i-am-avatar.com</a>&nbsp;- Школа Богов<br>
            <a href="http://www.jetman.com/">www.jetman.com</a>&nbsp;- Полет в реальной жизни с реактивным двигателем<br>
            <a href="http://www.somniacs.co/" target="_blank">www.somniacs.co</a>&nbsp;- Полет на аттракционе в Виртуальной Реальности<br>
            <a href="http://www.ansmed.ru/" target="_blank">www.ansmed.ru</a>&nbsp;- Институт Многомерной Медицины<br>
            <a href="http://www.wavegenetics.org/" target="_blank">www.wavegenetics.org</a>&nbsp;- Институт Квантовой Генетики<br>
            <a href="http://www.ronnastar.com/" target="_blank">www.ronnastar.com</a>&nbsp; - Ронна Герман - всемирно признанный канал Архангела Михаила<br>
            <a href="http://www.angeltherapy.com/" target="_blank">www.angeltherapy.com</a>&nbsp; - Дорин Вёрче (Doreen Virtue): Писательница, духовный целитель, ангелотерапевт</p>
            <p><iframe allowfullscreen="" frameborder="0" height="315" src="https://www.youtube.com/embed/_VPvKl6ezyc" width="100%"></iframe></p>

            <p><iframe allowfullscreen=""  frameborder="0" height="315" src="https://www.youtube.com/embed/gWLHIusLWOc" width="100%"></iframe></p>

            <h2>Союзничество с нами</h2>
            <p>Мы продаем тренажер Birdly@ на особых условиях для России и приглашаем всех кто готов принять участие в данном проекте. По вопросам сотрудничества пишите на почту <a href="mailto:avia@galaxysss.ru">avia@galaxysss.ru</a>.</p>
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
                <h2>Наши контакты</h2>
                <p>+7-925-237-45-01<br>+7-926-518-98-75</p>
                <p>
                    <a href="mailto:avia@galaxysss.ru" style="background-color: #2e6da4; padding: 10px 30px 10px 30px; border-radius: 10px;">avia@galaxysss.ru</a>
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

