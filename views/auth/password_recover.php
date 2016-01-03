<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Form\Registration */

$this->title = 'Восстановление пароля';
?>
<section class="container content-section" style="margin-bottom: 50px;">

        <div class="col-lg-4 col-lg-offset-4">
            <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                <div class="alert alert-success">
                    Перейдите на почту указанную Вами. Туда были отправлены инструкции для восстановления пароля.
                </div>
            <?php else: ?>
                <?php $form = ActiveForm::begin([
                    'id'                   => 'contact-form',
                    'enableAjaxValidation' => true,
                ]); ?>
                <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'email']])->label('Почта', ['class' => 'hide']) ?>
                <?php
                $field = $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-12">{image}</div></div><div class="row"><div class="col-lg-12">{input}</div></div>',
                ]);
                $field->enableAjaxValidation = false;
                echo $field;
                ?>
                <hr>
                <div class="form-group">
                    <?= Html::submitButton('Восстановить', [
                        'class' => 'btn btn-primary',
                        'name'  => 'contact-button',
                        'style' => 'width:100%;',

                    ]) ?>
                </div>
                <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
    </section>
