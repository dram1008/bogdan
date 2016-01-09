<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Свидетельство на правообладание планетой Земля для построения Новой Земли';
?>

<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Свидетельство на правообладание планетой Земля для построения Новой Земли</h2>

            <p class="text-center"><img src="/images/controller/products/svidetelstvo/1450666172_9RAcQICogZ.jpg" style="width: 100%; max-width: 600px; border-radius: 20px;" class="img-center"></p>
            <p>Свидетельство дает гарантию полной защиты от воздествий сдерживающих сил на уровне поступков, слов и мыслей.</p>
            <p>К свидетельству прилагается специальный вкладыш в паспорт гармонизируюший его до стандарта Золотого Века Творца и нейтрализирующий все сдерживающие силы на ваше воплощение на планете Земля.</p>



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
                'image'       => \yii\helpers\Url::to('/images/controller/products/svidetelstvo/1450666172_9RAcQICogZ.jpg', true),
                'title'       => 'Свидетельство на правообладание планетой Земля для построения Новой Земли',
                'description' => 'Свидетельство на правообладание планетой Земля для построения Новой Земли',
            ]) ?>



        </div>
    </div>
</section>


