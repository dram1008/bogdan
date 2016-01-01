<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Медиа материалы';
?>


<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Медиа материалы</h2>

            <p class="text-center">Траектория движения крыльев птиц, стрекоз, летучей мыши и насекомых</p>
            <p class="text-center"><img src="/images/controller/site/media/tumblr_nxmafvUP9e1tl8u0ko1_500.gif"  class="img-center"></p>
            <p class="text-center">Фильм Ангел-А</p>
            <p class="text-center"><iframe src="//vk.com/video_ext.php?oid=-48319873&id=171212722&hash=f3c9b9b2a2f03532&hd=2" width="100%" height="480"  frameborder="0"></iframe></p>
            <p class="text-center">Презентация yiiКрыльев Ангела</p>
            <p class="text-center"><iframe src="https://player.vimeo.com/video/150057401" width="100%" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></p>
            <p class="text-center"><iframe width="100%" height="315" src="https://www.youtube.com/embed/i7V33aCNso4" frameborder="0" allowfullscreen></iframe></p>


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

