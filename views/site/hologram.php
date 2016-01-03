<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Квантовая голограмма';
?>

<!-- About Section -->
<section id="about" class="container content-section">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Квантовая голограмма</h2>

            <p class="text-center"><img src="/images/controller/site/hologram/holo.png"
                                        style="max-width: 400px; width: 100%;"></p>

            <p class="lead" style="text-align: justify">
                Наблюдая эту мандалу вы получаете многомерное знание альтернативного развития и эволюции
                человечества
                направленное на Центральное Солнце Вселенной, которое говорит об объединении, синтезе, балансе
                мужских и
                женских энергий Вселенной и расположение их в соответствии с Божественным Замыслом Золотого Века
                Творца,
                где каждый атом вибрирует РАдостью и скрепляется Любовью, в самом центре России установлен символ
                изобилия – бесконечный Источник Энергии (<a
                    href="http://teslagen.org/news/2015/10/24/zapuschena_razrabotka_novogo_k" target="_blank">ТеслаГен</a>)
                полностью
                замещающий и нейтрализирующий все негативные действия и последствия действий <a
                    href="http://tainy.net/12607-zikkurat-v-centre-moskvy.html" target="_blank">Зикурата</a> и
                создании на
                планете Земля мира <a href="http://www.i-am-avatar.com/">Богов СоТворцов Эры Водолея</a>.
            </p>

            <p class="lead" style="text-align: justify">
                Обладая свободой воли вы имеете право на свободу выбора своего развития и принимаете решение на
                основе
                своей осознанности и неприкосновенности воли как «Я Есмь Творец и желаю всем Счастья».
            </p>

            <p>
                Эта мандала была специально разработана для прохождения Зведных Врат 11.11 (<a
                    href="http://www.galaxysss.ru/chenneling/2015/10/18/svyaschennyy_soyuz_vozvraschen">статья 1</a>
                и
                <a href="http://www.galaxysss.ru/chenneling/2015/11/07/svyaschennyy_soyuz_i_bozhestve">статья 2</a>).
                Они состоялись 11 ноября 2015 г. которые стали началом новой Эры Водоления и Новой Реальности и <a
                    href="/newEarth">Новой Земли</a>.
            </p>

            <hr>
            <p class="text-center"><a href="http://www.i-am-avatar.com/" target="_blank"><img class="img-circle"
                                                                                              src="/images/controller/site/hologram/Tesla-Gen-logo1-copy-5.jpg"
                                                                                              style="max-width: 400px; width: 100%;"></a>
            </p>
            <p class="text-center"><a href="http://www.i-am-avatar.com/" target="_blank" class="btn btn-primary">www.I-AM-AVATAR.com</a>
            </p>

            <p class="text-center">В скором времени сайт откроется, на котором будет рассказано
                как каждый желающий может себе вернуть все атрибуты божественного существа (аватара) и вспомнить
                себя
                как Творца Нового Мира.
                Также мы расскажем вам о способностях Аватара в
                новом фильме <a href="https://ru.wikipedia.org/wiki/%D0%90%D0%B2%D0%B0%D1%82%D0%B0%D1%80_2">Аватар
                    2</a>.
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
                <p class="text-center"><img src="/images/icon.png" class="img-center"></p>

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

