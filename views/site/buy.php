<?php

/* @var $this yii\web\View */
/* @var $model \cs\base\BaseForm */
/* @var $id int product_id bog_shop_product.id */


$this->title = 'Заказ';
$product = \app\models\Shop\Product::find($id);
$productPrice = $product->getField('price');
$this->registerJs(<<<JS
    $('.field-request-address').hide();
    $('input[name="Request[dostavka]"]').on('change', function() {
        var newPrice;
        if ($(this).val() == 3 || $(this).val() == 4) {
            $('.field-request-address').show();
            newPrice = productPrice + 300;
        } else if ($(this).val() == 5) {
            $('.field-request-address').show();
            newPrice = productPrice + 1000;
        } else {
            $('.field-request-address').hide();
            newPrice = productPrice;
        }
        $('#productPriceForm').attr('value', newPrice);
        $('#productPrice').html(newPrice);
    });
    $('.paymentType').click(function () {
        $('#paymentType').attr('value', $(this).data('value'));
        if (!$(this).hasClass('active')) {
            $('.paymentType').removeClass('active');
            $(this).addClass('active');
        }
    });
    $('.field-request-dostavka label').on('click', function() {
        alert(1);
        $('.field-request-dostavka').removeClass('has-error');
        $('.field-request-dostavka .help-block').hide();
    });

    $('.buttonSubmit').click(function() {
        // проверка формы
        var val = '';
        $('input[name="Request[dostavka]"]').each(function(i,v) {
            if ($(v).is(':checked')) {
                val = $(v).attr('value');
                return false;
            }
        });
        if (val == '') {
            $('.field-request-dostavka').addClass('has-error');
            $('.field-request-dostavka .help-block').html('Поле нужно выбрать обязательно').show();
            return false;
        }
        if (val == 3 || val == 4) {
            if ($('#request-address').val() == '') {
                $('.field-request-address').addClass('has-error');
                $('.field-request-address .help-block').html('Поле нужно заполнить обязательно').show();
                return false;
            }
        }

        ajaxJson({
            url: '/buy/ajax',
            data: {
                id: {$product->getId()},
                comment: $('#request-comment').val(),
                dostavka: val,
                price: $('input[name="sum"]').val(),
                phone: $('#request-phone').val(),
                address: $('#request-address').val()
            },
            success: function(ret) {
                if ($('input[name="sum"]').val() > 15000) {
                    window.location = '/requests/' + ret;
                } else {
                    window.location = '/buy/request/' + ret + '?type=' + $('#paymentType').val();
                }
            }

        });
    })
JS
);
$this->registerJs(<<<JS
    var productPrice = {$productPrice};
JS
    , \yii\web\View::POS_HEAD);
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: #000000">Условия доставки подарков</h4>
            </div>
            <style>
                .modal-body p {
                    font-size: 100%;
                }
            </style>
            <div class="modal-body" style="color: #000000;">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;margin-bottom: 100px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Получение подарка</h2>

            <div class="row" style="margin-bottom: 50px;">
                <div class="col-lg-12">
                    <img src="<?= $product->getImage() ?>" width="100" style="float: left; margin-right: 20px;"/>
                    <?= $product->getField('name') ?>
                </div>
                <div class="col-lg-6" style="margin-top: 12px;">
                    <div class="alert alert-info" style="color: #000000;font-size: 200%;">Итого: <span
                        id="productPrice"><?= Yii::$app->formatter->asDecimal($product->getField('price'), 0) ?></span>
                    руб</div>
                </div>
                <div class="col-lg-6" style="margin-top: 12px;">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="width: 100%;">
                        О доставке
                    </button>
                </div>
            </div>


            <div class="row" id="blockLogin"<?php if (!Yii::$app->user->isGuest) echo(' style="display: none;"') ?>>
                <div class="col-lg-12" style="padding-bottom: 30px; font-size: 200%;">
                    Вы не авторизованы. Если вы в первый раз на нашем сайте, то зарегистрируйтесь. Или войдит если у вас есть логин.
                </div>
                <div class="col-lg-6">
                    Вход
<!--                    <input class="form-control" type="text" width="100%" name="login" id="formLoginUserName">-->
<!--                    <input class="form-control" type="password" width="100%" name="password" id="formLoginPassword">-->
                    <?php
                    $form = \yii\bootstrap\ActiveForm::begin([
                        'id'                 => 'login-form',
                        'enableClientScript' => false,
                    ]);
                    $model2 = new \app\models\Auth\Login();
                    ?>

                    <?= $form->field($model2, 'username', ['inputOptions' => ['placeholder' => 'Логин']])->label('', ['class' => 'hide']) ?>
                    <?= $form->field($model2, 'password', ['inputOptions' => ['placeholder' => 'Пароль']])->label('', ['class' => 'hide'])->passwordInput() ?>

                    <?php \yii\bootstrap\ActiveForm::end(); ?>
                    <button class="btn btn-default" id="buttonLogin" style="width: 100%;">Войти</button>

                    <?php
                    $this->registerJs(<<<JS
                        $('#buttonLogin').click(function(){
                            if ($('#login-username').val() == '') {
                                $('.field-login-username').addClass('has-error');
                                $('.field-login-username .help-block').show().html('Нужно заполнить логин');

                                return false;
                            }
                            if ($('#login-password').val() == '') {
                                $('.field-login-password').addClass('has-error');
                                $('.field-login-password .help-block').show().html('Нужно заполнить пароль');

                                return false;
                            }
                            ajaxJson({
                                url: '/loginAjax',
                                data: {
                                    login: $('#login-username').val(),
                                    password: $('#login-password').val()
                                },
                                success: function(ret) {
                                    $('#blockLogin').hide();
                                    $('#blockOrder').show();
                                    $('#blockProfileLi').html($('#menuProfile').clone().show().removeAttr('id'));
                                    $('#blockProfileLi .buttonMain').click(function() {
                                        window.location = '/requests';
                                    });
                                },
                                errorScript: function(ret) {
                                    if (ret.id == 101) {
                                        $('.field-login-username').addClass('has-error');
                                        $('.field-login-username .help-block').show().html(ret.data);
                                    }
                                    if (ret.id == 102) {
                                        $('.field-login-password').addClass('has-error');
                                        $('.field-login-password .help-block').show().html(ret.data);
                                    }
                                }
                            });

                        });
                        $('#login-username').on('focus', function() {
                            $('.field-login-username').removeClass('has-error');
                            $('.field-login-username .help-block').hide();
                        });
                        $('#login-password').on('focus', function() {
                            $('.field-login-password').removeClass('has-error');
                            $('.field-login-password .help-block').hide();
                        });
JS
);
                    ?>
                </div>
                <div class="col-lg-6">
                    Регистрация
                    <?php
                    $form = \yii\bootstrap\ActiveForm::begin([
                        'id'                 => 'rigistration-form',
                        'enableClientScript' => false,
                    ]);
                    $model2 = new \app\models\Auth\Regisration();
                    ?>

                    <?= $form->field($model2, 'name', ['inputOptions' => ['placeholder' => 'Имя (Фамилия)']])->label('', ['class' => 'hide']) ?>
                    <?= $form->field($model2, 'username', ['inputOptions' => ['placeholder' => 'Логин/почта']])->label('', ['class' => 'hide']) ?>

                    <?php \yii\bootstrap\ActiveForm::end(); ?>
                    <button class="btn btn-default" id="buttonRegister" style="width: 100%;">Войти</button>
                    <?php
                    $this->registerJs(<<<JS
                        $('#buttonRegister').click(function(){
                            if ($('#regisration-name').val() == '') {
                                $('.field-regisration-name').addClass('has-error');
                                $('.field-regisration-name .help-block').show().html('Нужно заполнить имя');

                                return false;
                            }
                            if ($('#regisration-username').val() == '') {
                                $('.field-regisration-username').addClass('has-error');
                                $('.field-regisration-username .help-block').show().html('Нужно заполнить логин');

                                return false;
                            }

                            ajaxJson({
                                url: '/registrationAjax',
                                data: {
                                    login: $('#regisration-username').val(),
                                    name: $('#regisration-name').val()
                                },
                                success: function(ret) {
                                    $('#blockLogin').hide();
                                    $('#blockOrder').show();
                                    $('#blockProfileLi').html($('#menuProfile').clone().show().removeAttr('id'));
                                    $('#blockProfileLi .buttonMain').click(function() {
                                        window.location = '/requests';
                                    });

                                },
                                errorScript: function(ret) {
                                    if (ret.id == 101) {
                                        $('.field-regisration-username').addClass('has-error');
                                        $('.field-regisration-username .help-block').show().html(ret.data);
                                    }
                                }
                            });

                        });
                        $('#regisration-username').on('focus', function() {
                            $('.field-regisration-username').removeClass('has-error');
                            $('.field-regisration-username .help-block').hide();
                        });
                        $('#regisration-name').on('focus', function() {
                            $('.field-regisration-name').removeClass('has-error');
                            $('.field-regisration-name .help-block').hide();
                        });
JS
                    );
                    ?>
                </div>
            </div>

            <div id="blockOrder"<?php if (Yii::$app->user->isGuest) echo(' style="display: none;"') ?>>
                <?php
                $model = new \app\models\Form\Shop\Request();
                $form = \yii\bootstrap\ActiveForm::begin([
                    'id'                 => 'contact-form',
                    'options'            => ['enctype' => 'multipart/form-data'],
                    'enableClientScript' => false,
                ]);
                ?>
                <?= $model->field($form, 'dostavka')->radioList(\app\models\Shop\Request::$dostavkaList) ?>
                <?= $model->field($form, 'address')->textarea(['rows' => 3]) ?>
                <?= $model->field($form, 'phone') ?>
                <?= $model->field($form, 'comment')->textarea(['rows' => 3]) ?>
                <?php \yii\bootstrap\ActiveForm::end(); ?>
                Оплата:
                <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" name="form2" id="formPay">
                    <input type="hidden" name="receiver" value="410011473018906">
                    <input type="hidden" name="formcomment" value="Авиалинии «БогДан»">
                    <input type="hidden" name="short-dest" value="<?= $product->getField('name') ?>">
                    <input type="hidden" name="label" value="" id="formPayLabel">
                    <input type="hidden" name="quickpay-form" value="donate">
                    <input type="hidden" name="targets" value="<?= $product->getField('name') ?>">
                    <input type="hidden" name="sum" value="<?= $product->getField('price') ?>" data-type="number"
                           id="productPriceForm">
                    <input type="hidden" name="comment" value="">
                    <input type="hidden" name="need-fio" value="false">
                    <input type="hidden" name="need-email" value="false">
                    <input type="hidden" name="need-phone" value="false">
                    <input type="hidden" name="shopSuccessURL" value="" id="formShopSuccessURL">
                    <input type="hidden" name="need-address" value="false">
                    <input type="hidden" name="paymentType" value="AC" id="paymentType">

                    <?php if ($product->getField('price') < 15000) { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-group" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default paymentType" data-value="PC">
                                        Яндекс.Деньгами
                                    </button>
                                    <button type="button" class="btn btn-default paymentType active" data-value="AC">
                                        Банковской картой
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Перевед ваших благодарностей осуществляется в личном кабинете.</p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 30px;">
                            <div class="btn-group" role="group" aria-label="...">

                                <input type="button" value="Перейти к оплате"
                                       class="btn btn-success btn-lg buttonSubmit" style="width: 400px; border: 2px solid white; border-radius: 20px;">
                            </div>
                        </div>
                    </div>



                </form>
            </div>

        </div>
    </div>
</section>



