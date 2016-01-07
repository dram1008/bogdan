<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Акселератор Мозга';
?>

<!-- Intro Header -->
<header class="intro" style="height: 600px; background: url('/images/controller/products/accelerator/1267518_649726548370820_1261685365_o.jpg')  no-repeat top scroll;">
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
            <h2 class="text-center">О продукте</h2>

            <p>«Акселератор мозга» - добавка к пище, не является лекарством, препарат внутри.</p>

            <p>О препарате:<br>Увеличивает способности к Творчеству, открывает канал Вдохновения, дает ясное понимание вещей, развивает ясновидение, яснослышание, способности к телепатии.</p>

            <p>Способ применения и дозы: принимайте препарат 3 раза в день перед едой или чаем (водой). Рекомендуемый курс 0,5-3 месяца в зависимости от способностей.</p>

            <p>Противопоказания: нет.</p>

            <p>Срок годности: 100 лет</p>

            <p>Ограничения к применению: нет.</p>

            <p>Меры предосторожности: нет.</p>

            <p>На вкус совершенно нейтральные.</p>

            <p>Побочные действия: возникают беспричинные приступы Любви к окружающим, спонтанное ощущение благодарности Миру, безконтрольно возникают признаки Счастья и Радости.</p>

            <p>Передозировка: невозможно, главное следуйте четкой инструкции по применению, при увеличении дозы и чрезмерном употреблении могут возникать случаи телепортации или телекинеза.</p>

            <p>После прохождения курса все признаки остаются и набирают сочность.</p>

            <p>К препарату прилагается активатор-гармонизатор.</p>

            <p>Стандарт качества Золотого Века соблюден: Eco, Natural, Organic, Hand Made, Pure Vegetarian, With Love.</p>

            <p>Уникальная разработка от Института Многомерный Медицины. http://www.galaxysss.ru/category/medical/344</p>

            <p>Включена в Перечень жизненно необходимых и важнейших лекарственных препаратов.</p>

            <p>Есть Лицензия и Патент.</p>

            <p><img src="/images/controller/products/accelerator/1267518_649726548370820_1261685365_o.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/1.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/2.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/3.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/4.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/5.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/6.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/7.jpg" width="100%" style="border-radius: 20px;"></p>
            <p><img src="/images/controller/products/accelerator/8.jpg" width="100%" style="border-radius: 20px;"></p>



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
                'image'       => \yii\helpers\Url::to('/images/controller/products/accelerator/1267518_649726548370820_1261685365_o.jpg', true),
                'title'       => 'Акселератор мозга',
                'description' => 'Увеличивает способности к Творчеству, открывает канал Вдохновения, дает ясное понимание вещей, развивает ясновидение, яснослышание, способности к телепатии.',
            ]) ?>



        </div>
    </div>
</section>

