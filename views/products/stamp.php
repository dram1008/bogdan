<?php

/* @var $this yii\web\View */
/* @var $list array */
/* @var $pagesCount int */
/* @var $page int */

$this->title = 'Печать творца';
?>

<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="margin-bottom: 100px;">
            <h2 class="text-center">Печать творца</h2>

            <p class="text-center"><img src="/images/controller/products/stamp/IMG_0571.jpg"
                                        style="width: 100%; max-width: 400px; border-radius: 20px;" class="img-center"></p>

            <p>Печать Творца - это инструмент для концентрации вашего внимания и структуризации пространства. Это
                мандала с кристаллами. Вам ее желательно разместить в часто видимое вам место, можно на алтарь или на
                тот инструмент, который вы считаете является вашим инструментом, которым вы творите жизнь вокруг себя.
                Эта печать будет разворачивать пространство творения вашего Мира. Для работы с Печатью используйте
                следующее действие: утром после пробуждения и вечером перед сном сконцентрируйте внимание на Печати и
                свизуализируйте шар света находящийся в центре нее, произнесите формулу вслух или про себя "Я Есмь
                Творец, Я Желаю Всем Счастья", возьмите своими ладонями этот шар и поместите себе в область Сахасрары
                (вершина Головы) после этот шар света разлейте по всему телу и выпустите в Мир через свое сердце желая
                всем Счастья.</p>

            <p>Треугольник вверх - мужской аспект.</p>

            <p>Треугольник вниз - женский аспект.</p>

            <p class="text-center"><img src="/images/controller/products/stamp/bogorodica.png"
                                        style="width: 100%; max-width: 400px; border-radius: 20px;" class="img-center"></p>

            <p>Печать Богородицы - имеет тоже назначение, но применяется для женщин.</p>


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
                'image'       => \yii\helpers\Url::to('/images/controller/products/stamp/IMG_0571.jpg', true),
                'title'       => 'Печать Творца и Богородицы',
                'description' => 'Печать Творца - это инструмент для концентрации вашего внимания и структуризации пространства. Это
                мандала с кристаллами.',
            ]) ?>



        </div>
    </div>
</section>



