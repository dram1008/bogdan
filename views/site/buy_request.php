<?php

/* @var $this yii\web\View */
/* @var $request \app\models\Shop\Request */


$this->title = 'Заказ';
$product = $request->getProduct();

$this->registerJs(<<<JS
    $('#formPay').submit();
JS
);
?>


<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Идет перенаправление на оплату...</h2>

            <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml" name="form2" id="formPay">
                <input type="hidden" name="receiver" value="410011473018906">
                <input type="hidden" name="formcomment" value="Авиалинии «БогДан»">
                <input type="hidden" name="short-dest" value="<?= $product->getField('name') ?>">
                <input type="hidden" name="label" value="bogdan.<?= $request->getId() ?>" id="formPayLabel">
                <input type="hidden" name="quickpay-form" value="donate">
                <input type="hidden" name="targets" value="<?= $product->getField('name') ?>">
                <input type="hidden" name="sum" value="<?= $request->getField('price') ?>" data-type="number"
                       id="productPriceForm">
                <input type="hidden" name="comment" value="">
                <input type="hidden" name="need-fio" value="false">
                <input type="hidden" name="need-email" value="false">
                <input type="hidden" name="need-phone" value="false">
                <input type="hidden" name="shopSuccessURL" value="" id="formShopSuccessURL">
                <input type="hidden" name="need-address" value="false">
                <input type="hidden" name="paymentType" value="<?= Yii::$app->request->get('type', 'AC') ?>" id="paymentType">

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
</section>





