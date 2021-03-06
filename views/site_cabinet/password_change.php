<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Form\Registration */

$this->title = 'Смена пароля';
?>

<section class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                <div class="alert alert-success">
                    Поздравляем вы успешно установили новый пароль.
                </div>

            <?php else: ?>

                <?php $form = ActiveForm::begin([
                    'id'                   => 'contact-form',
                    'enableAjaxValidation' => true,
                ]); ?>
                <?php
                $field = $form->field($model, 'password1')->passwordInput()->label('Пароль');
                $field->validateOnBlur = true;
                echo $field;
                ?>
                <?= $form->field($model, 'password2')->passwordInput()->label('Повторите пароль') ?>
                <div class="form-group">
                    <?= Html::submitButton('Подтвердить', [
                        'class' => 'btn btn-primary',
                        'name'  => 'contact-button'
                    ]) ?>
                </div>
                <?php ActiveForm::end(); ?>

            <?php endif; ?>
             </div>
    </div>
</section>
