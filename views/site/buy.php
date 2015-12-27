<?php

/* @var $this yii\web\View */
/* @var $model \cs\base\BaseForm */
/* @var $id int */

$this->title = 'Заказ';
?>



<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Цены</h2>

            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) { ?>

                <div class="alert alert-success">
                    Успешно добавлено.
                </div>

            <?php } else { ?>

                <?php $form = \yii\bootstrap\ActiveForm::begin([
                    'id'      => 'contact-form',
                    'options' => ['enctype' => 'multipart/form-data']
                ]); ?>
                <?= $model->field($form, 'address')->textarea(['rows' => 10]) ?>
                <?= $model->field($form, 'comment')->textarea(['rows' => 10]) ?>

                <hr>
                <div class="form-group">
                    <?= \yii\helpers\Html::submitButton('Заказать', [
                        'class' => 'btn btn-default btn-lg',
                        'name'  => 'contact-button',
                        'style' => 'width:100%',
                    ]) ?>
                </div>
                <?php \yii\bootstrap\ActiveForm::end(); ?>

            <?php } ?>

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
                <h2>Попробовать</h2>
                <p>Один билет равен 1 000 благодарностей (руб.) в наш адрес</p>
                <a href="/price" class="btn btn-default btn-lg">Получить билет</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>Наши контакты</h2>
            <p>+7-925-237-45-01<br>+7-926-518-98-75</p>
            <p>
                <a href="mailto:avia@galaxysss.ru">avia@galaxysss.ru</a>
            </p>

        </div>
    </div>
</section>

