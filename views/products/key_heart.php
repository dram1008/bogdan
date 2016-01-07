<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Ключ к сердцу';
?>

<!-- Intro Header -->
<header class="intro" style="height: 600px; background: url('/images/controller/products/key_heart/header.jpg')  no-repeat top scroll;">
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
            <h2 class="text-center">Ключ к сердцу</h2>

            <p class="text-center"><img src="/images/controller/products/key_heart/IMG_0648_.jpg" style="width: 100%; max-width: 400px;" class="img-center"></p>
            <p>«Ключ к сердцу» - инструмент гармонизации отношений.</p>

            <p>Это уникальная разработка, завоевавшая и открывшая сердца всех, кто ею пользовался. Этот ключ универсальный, подходит как для мужского, так и для женского сердца. Открывает даже самые скрипучие и тяжело заваленные камнями сердца. Поставляется с инструкцией по применению и открытию сердца.</p>
            <p>Этот препарат поставляется вместе с гармонизатором, наличие которого существенно повышает уровень Любви в доме.</p>




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
                'title'       => 'Ключ к сердцу',
                'description' => '«Ключ к сердцу» - инструмент гармонизации отношений.',
            ]) ?>



        </div>
    </div>
</section>


