<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Защитный Амулет на Автомобиль';
?>

<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Защитный Амулет на Автомобиль</h2>

            <p class="text-center"><img src="/images/controller/products/car_keeper/car.jpg" style="width: 100%; max-width: 400px;border-radius: 20px;" class="img-center"></p>
            <p>Предназначен для размещения на лобовом стекле автомобиля. Размер 10х15см.</p>
            <p>Поставляется совместно с тремя наклейками-голограммами. Две спереди и сзади с защитным покрытием. Одна внутри. Размер 10 см в диаметре.</p>
            <p class="text-center"><img src="/images/controller/products/car_keeper/holo.png" style="width: 100%; max-width: 400px;" class="img-center"></p>
            <p style="text-align: justify">Смысл ее следующий:</p>
            <p class="lead" style="text-align: justify">
                Наблюдая эту мандалу вы получаете многомерное знание альтернативного развития и эволюции
                человечества
                направленное на Центральное Солнце Вселенной, которое говорит об объединении, синтезе, балансе
                мужских и
                женских энергий Вселенной и расположение их в соответствии с Божественным Замыслом Золотого Века
                Творца,
                где каждый атом вибрирует РАдостью и скрепляется Любовью, в самом центре России установлен символ
                изобилия – бесконечный Источник Энергии (<a
                    href="http://teslagen.org/news/2015/10/24/zapuschena_razrabotka_novogo_k"
                    target="_blank"
                    >ТеслаГен</a>) полностью
                замещающий и нейтрализирующий все негативные действия и последствия действий <a
                    href="http://galaxysss.ru/blog/2015/12/07/mavzoley__okkultnoe_stroenie"
                    target="_blank">Зикурата</a> и создании на
                планете Земля мира <a href="http://www.i-am-avatar.com/">Богов СоТворцов Эры Водолея</a>.
            </p>

            <p class="lead" style="text-align: justify">
                Обладая свободой воли вы имеете право на свободу выбора своего развития и принимаете решение на
                основе
                своей осознанности и неприкосновенности воли как «Я Есмь Творец и желаю всем Счастья».
            </p>
            <hr>
            <p>
                Эта мандала была специально разработана для прохождения Зведных Врат 11.11 (<a
                    href="http://www.galaxysss.ru/chenneling/2015/10/18/svyaschennyy_soyuz_vozvraschen">статья 1</a>
                и
                <a href="http://www.galaxysss.ru/chenneling/2015/11/07/svyaschennyy_soyuz_i_bozhestve">статья 2</a>).
                Они состоялись 11 ноября 2015 г. которые стали началом новой Эры Водоления и Новой Реальности и <a
                    href="<?= \yii\helpers\Url::to(['new_earth/index']) ?>">Новой Земли</a>.
            </p>

            <p>
                Эта голограмма была активирована 11.11.2015 года в <a href="/newEarth/chakri">тринадцатой чакре планеты Земля</a> (Сергиев Посад) в
                храмах Марии Магдалины, Архангела Михаила и Храме Вознесения с полным соблюдением <a href="/blog/2015/12/17/desyat_principov_soznatelnogo_">Десяти Принципов
                    Сознательного Творения Реальности</a> в собрании Богов и Архангелов для блага всех живых существ планеты
                Земля.
            </p>

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
                'image'       => \yii\helpers\Url::to('/images/controller/products/car_keeper/car.jpg', true),
                'title'       => 'Защитный Амулет на Автомобиль',
                'description' => 'Предназначен для размещения на лобовом стекле автомобиля. Размер 10х15см. Поставляется совместно с тремя наклейками-голограммами. Одна спереди (с защитным покрытием). Одна сзади (с защитным покрытием). Одна внутри. Размер 10 см в диаметре.',
            ]) ?>



        </div>
    </div>
</section>

