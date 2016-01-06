<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Оберег Ангела-Хранителя';
?>

<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 80px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Оберег Ангела-Хранителя</h2>

            <div class="row">
                <div class="col-lg-6">
                    <img src="/images/controller/products/obereg/on.jpg" width="100%" style="border-radius: 20px;"/>
                </div>
                <div class="col-lg-6">
                    <img src="/images/controller/products/obereg/ona.jpg" width="100%" style="border-radius: 20px;"/>
                </div>
            </div>
            <p>Оберег желательно разместить в спальной комнате чтобы в лежачем положении оберег был прямо виден. Или разместить на алтаре если такой имеется.</p>
            <p>На обереге написан текст самонастройка, который рекомендуется читать с утра.</p>
            <p>Прилагается инструкция по применению.</p>
            <p>Формат А4</p>



        </div>
    </div>
</section>



<!-- Download Section -->
<section class="content-section text-center">
    <div class="download-section" style="
    border-top: 1px solid #87aad0;
    ">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2" style="color: #000000">
                <p class="text-center"><img src="/images/icon.png" class="img-center"> </p>
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
             - Налаживание и подъем энергетики в других сферах деятелсьности.',
                ]) ?>
            </div>
        </div>
    </div>
</section>

