<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Корректировка рода';
?>

<!-- Intro Header -->
<header class="intro" style="height: 400px; background: url('/images/controller/products/rod/1411572119_604156959_1624050163.jpg')  no-repeat center scroll;">
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
            <h2 class="text-center">Персональная корректировка «Восстановление Рода» от Мастера Максима Кравцова</h2>

            <p class="text-center"><img src="/images/controller/products/rod/max.jpg" style="width: 100%; max-width: 400px; border-radius: 20px;" class="img-center"></p>
            <p>Корректировка проводится персонально для человека без участия членов семьи. Продолжительность: 2 часа при личной встрече.</p>
            <p>Что вы получите в пезультате:<br>
             - Легкость сердца сразу после коректировки<br>
             - Гармония в отношениях в родными<br>
             - Наставления как поддерживать гармоничные отношения<br>
             - Налаживание и подъем энергетики в других сферах деятельности.</p>
            <p>Максим Кравцов – исследователь, коуч, психолог, просветитель, путешественник, консультант по вопросам благополучия, автор ряда публикаций и патентов. В 2001г успешно окончил Национальный Аэрокосмический Университет. В настоящее время Президент Отделения Международной Академии общественного развития (МАОР) - Институт Гармоничного Развития Человека. Ведет частную консультационную и тренинговую практику. Является автором таких известных в сети медиа-продуктов, как «Формула любви к себе», «Формула мысли Бога. Осознание своей божественности», «Формула БОГатства», «Формула проявления Вселенского Изобилия», «Формула СчастьЯ».</p>
            <p class="text-center">
                <img src="/images/controller/products/rod/bLWg6--nPQQ.jpg" style="height: 300px; border-radius: 20px;" >
            </p>

            <p>«Главный мой приоритет - это близкие по духу и энергетике люди, желающие расти профессионально и творчески вместе. Я люблю работать с теми, кто готов заглянуть внутрь себя, кто стремится изучить и проявить свой внутренний созидательный  потенциал. У меня нет готовых ответов на ваши трудности и проблемы, но я верю, что мы можем исследовать и найти решение» (с) М.К.</p>
            <p>skype: maxmakermax</p>
            <p><iframe width="100%" height="400" src="https://www.youtube.com/embed/2W6ZxCOOYY8" frameborder="0" allowfullscreen></iframe></p>
            <p><iframe width="100%" height="400" src="https://www.youtube.com/embed/hdJlX5DQK_Q" frameborder="0" allowfullscreen></iframe></p>
            <p class="text-center"><img src="/images/controller/products/rod/1385868_526638854089371_352584650_n2.jpg" style="width: 100%; max-width: 400px; border-radius: 20px; border: 1px solid #000000;" class="img-center"></p>


        </div>
    </div>
</section>



<!-- Download Section -->
<section class="content-section text-center">
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
                    <a href="mailto:avia@galaxysss.ru" style="color: #000000;">avia@galaxysss.ru</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- share Section -->
<section class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Поделиться</h2>
            <?= $this->render('../blocks/share', [
                'url'         => \yii\helpers\Url::current([], true),
                'image'       => \yii\helpers\Url::to('/images/controller/products/rod/1385868_526638854089371_352584650_n2.jpg', true),
                'title'       => 'Персональная корректировка «Восстановление Рода» от Мастера Максима Кравцова',
                'description' => 'Корректировка проводится персонально для человека без участия членов семьи. Продолжительность: 2 часа при личной встрече.
            Что вы получите в пезультате:
             - Легкость сердца сразу после коректировки;
             - Гармония в отношениях в родными;
             - Наставления как поддерживать гармоничные отношения;
             - Налаживание и подъем энергетики в других сферах деятельности.',
            ]) ?>



        </div>
    </div>
</section>


