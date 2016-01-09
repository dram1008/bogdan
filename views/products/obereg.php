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
            <p style="margin-top: 30px;">Оберег желательно разместить в спальной комнате чтобы в лежачем положении оберег был прямо виден. Или разместить на алтаре если такой имеется.</p>
            <p>На обереге написан текст самонастройка, который рекомендуется читать с утра.</p>
            <p>Прилагается инструкция по применению.</p>
            <p>Формат А4</p>



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
                'image'       => \yii\helpers\Url::to('/images/controller/products/key_heart/header.jpg', true),
                'title'       => 'Оберег Ангела-Хранителя',
                'description' => 'Оберег желательно разместить в спальной комнате чтобы в лежачем положении оберег был прямо виден. Или разместить на алтаре если такой имеется.',
            ]) ?>



        </div>
    </div>
</section>
