<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Условия доставки подарков';
?>


<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Условия доставки подарков</h2>

            <p>
                У нас есть несколько способов получения наших подарков. Во первых вы можете из получить сразу после получения билета или во время вашего вылета.
            </p>
            <p>
                На месте полета - Вы получаете подарки сразу на месте полета, когда он состоится.
            </p>
            <p>
                Самовывоз - Вы можете приехать к нам за подарком самостоятельно.
            </p>
            <p>
                Доставка по Москве - Доставка осуществляется за 1-2 рабочих дня после оформления заказа. Доставка осуществляется пока только до метро. Стоимость 300 руб.
            </p>
            <p>
                Доставка по России - Доставка осуществляется за 1-2 рабочих дня после оформления заказа. Доставка осуществляется по почте России. Стоимость 300 руб.
            </p>
            <p>
                Доставка по миру - Доставка осуществляется за 3-4 рабочих дня после оформления заказа. Доставка осуществляется международными компаниями TNT, DHL. Стоимость 1000 руб.
            </p>

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

