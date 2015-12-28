<?php

/* @var $this yii\web\View */
/* @var $model \cs\base\BaseForm */
/* @var $request \app\models\Shop\Request  заказ */

$this->title = 'Заказ. шаг 2';


$this->registerJs(<<<JS
    $('.paymentType').click(function (){
        $('#paymentType').attr('value', $(this).data('value'));
        if (!$(this).hasClass('active')) {
            $('.paymentType').removeClass('active');
            $(this).addClass('active');
        }
    });

JS
);
?>





<!-- Download Section -->
<section id="download" class="content-section text-center">
    <div class="download-section" style="
    border-bottom: 1px solid #87aad0;
    border-top: 1px solid #87aad0;
    ">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2" style="color: #000000">
                <p class="text-center"><img src="/images/icon.png" class="img-center"></p>

                <h2 class="text-center">Шаг 2</h2>

                <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
                    <input type="hidden" name="receiver" value="410011473018906">
                    <input type="hidden" name="formcomment" value="<?= $request->getField('name')?>">
                    <input type="hidden" name="short-dest" value="<?= $request->getField('name')?>">
                    <input type="hidden" name="label" value="1231">
                    <input type="hidden" name="quickpay-form" value="donate">
                    <input type="hidden" name="targets" value="<?= $request->getField('name')?>">
                    <input type="hidden" name="sum" value="<?= $request->getField('price')?>" data-type="number">
                    <input type="hidden" name="comment" value="">
                    <input type="hidden" name="need-fio" value="false">
                    <input type="hidden" name="need-email" value="false">
                    <input type="hidden" name="need-phone" value="false">
                    <input type="hidden" name="need-address" value="false">
                    <input type="hidden" name="paymentType" value="AC" id="paymentType">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default paymentType" data-value="PC">Яндекс.Деньгами</button>
                                <button type="button" class="btn btn-default paymentType active" data-value="AC">Банковской картой</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-top: 30px;">
                            <div class="btn-group" role="group" aria-label="...">
                                <input type="submit" value="Перевести" class="btn btn-default" style="width: 400px;">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>


