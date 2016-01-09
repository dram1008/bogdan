<?php

/* @var $this yii\web\View */
/* @var $items array */
/* @var $request \app\models\Shop\Request */

$product = $request->getProduct();
$this->title = 'Заказ';
?>

<style>
    .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }
    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }
    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }
    .timeline > li:before,
    .timeline > li:after {
        content: " ";
        display: table;
    }
    .timeline > li:after {
        clear: both;
    }
    .timeline > li:before,
    .timeline > li:after {
        content: " ";
        display: table;
    }
    .timeline > li:after {
        clear: both;
    }
    .timeline > li > .timeline-panel {
        width: 46%;
        float: left;
        border: 1px solid #d4d4d4;
        border-radius: 2px;
        padding: 20px;
        position: relative;
        -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        background-color: white;
    }
    .timeline > li > .timeline-panel:before {
        position: absolute;
        top: 26px;
        right: -15px;
        display: inline-block;
        border-top: 15px solid transparent;
        border-left: 15px solid #ccc;
        border-right: 0 solid #ccc;
        border-bottom: 15px solid transparent;
        content: " ";
    }
    .timeline > li > .timeline-panel:after {
        position: absolute;
        top: 27px;
        right: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-left: 14px solid #fff;
        border-right: 0 solid #fff;
        border-bottom: 14px solid transparent;
        content: " ";
    }
    .timeline > li > .timeline-badge {
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        font-size: 1.4em;
        text-align: center;
        position: absolute;
        top: 16px;
        left: 50%;
        margin-left: -25px;
        background-color: #999999;
        z-index: 100;
        border-top-right-radius: 50%;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
        border: 1px solid rgba(255,255,255,0.5);
    }
    .timeline > li.timeline-inverted > .timeline-panel {
        float: right;
        background-color: white;
    }
    .timeline > li.timeline-inverted > .timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }
    .timeline > li.timeline-inverted > .timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }
    .timeline-badge.primary {
        background-color: #2e6da4 !important;
    }
    .timeline-badge.success {
        background-color: #3f903f !important;
    }
    .timeline-badge.warning {
        background-color: #f0ad4e !important;
    }
    .timeline-badge.danger {
        background-color: #d9534f !important;
    }
    .timeline-badge.info {
        background-color: #5bc0de !important;
    }
    .timeline-title {
        margin-top: 0;
        color: #000000;
        text-transform: none;
        font-weight: normal;

    }
    .timeline-body {
        color: #000000;
    }
    .timeline-body > p,
    .timeline-body > ul {
        margin-bottom: 0;
        color: #000000;
    }
    .timeline-body > p + p {
        margin-top: 5px;
    }
    h4 {
        margin-bottom: 10px;
    }
    p {
        margin-bottom: 10px;
    }
    .text-muted {
        font-size: 70%;
    }
</style>


<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="padding-bottom: 50px;">
            <h2 class="text-center">Заказ</h2>
            <p>Идентификацинный номер: <?= $request->getId() ?></p>
            <p>Контактный телефон: <?= $request->getField('phone') ?></p>
            <p>Доставка: <?= $request->getDostavkaText() ?></p>
            <?php if ($request->getField('dostavka') == 3 || $request->getField('dostavka') == 4) { ?>
                <p><?= $request->getField('address') ?></p>
            <?php } ?>
            <p>Комментарий: <?= $request->getField('comment') ?></p>
            <p>Стоимость: <?= Yii::$app->formatter->asCurrency($request->getField('price'))  ?></p>
            <p>Продукт: <?= $product->getField('name') ?></p>
            <div style="padding: 20px; background-color: #2e6da4; border: 1px solid darkblue; color: white; border-radius: 10px; margin-bottom: 30px; width: 100; max-width: 400px;">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<?= $product->getImage() ?>" style="width: 100%; border-radius: 10px;">
                        <?= $product->getField('content') ?>
                    </div>
                    <div class="col-lg-8">
                        <?= $product->getField('content') ?>
                    </div>
                </div>
            </div>
            <p>Создан: <?= Yii::$app->formatter->asDatetime($request->getField('date_create'))   ?></p>
            <p>Билеты:</p>
            <?php if ($request->getField('is_paid', 0) == 0) { ?>
                <p>Заказ еще не оплачен</p>
            <?php } else { ?>
                <?php foreach($request->getTickets() as $t) { ?>
                    <p><a href="<?=\yii\helpers\Url::to(['site/ticket', 'id'=> $t['id']])?>" target="_blank">Билет №<?= $t['id'] ?></a></p>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="col-lg-12" style="padding-bottom: 50px;">
        <h2 class="page-header">История заказа</h2>
            <?php $this->registerJs('$(".timeBack").tooltip()'); ?>
            <ul class="timeline">
                <?php foreach($request->getMessages()->all() as $item) { ?>
                    <?php
                    $side = 'client';
                    $liSuffix = '';
                    if ($item['direction'] == (($side == 'client')? \app\models\Shop\Request::DIRECTION_TO_SHOP : \app\models\Shop\Request::DIRECTION_TO_CLIENT)) {
                        $liSuffix = ' class="timeline-inverted"';
                    }
                    if (\yii\helpers\ArrayHelper::getValue($item, 'status', '') == '') {
                        $type = 'message';
                        $header = 'Сообщение';
                        $icon = 'glyphicon-envelope';
                        $color = 'info';
                        $message = $item['message'];
                    } else {
                        $type = 'status';
                        $header = \app\models\Shop\Request::$statusList[$item['status']][$side];
                        $icon = \app\models\Shop\Request::$statusList[$item['status']]['timeLine']['icon'];
                        $color = \app\models\Shop\Request::$statusList[$item['status']]['timeLine']['color'];
                        $message = \yii\helpers\ArrayHelper::getValue($item, 'message', '');
                    }
                    ?>
                    <li<?= $liSuffix ?>>
                        <div class="timeline-badge <?= $color ?>"><i class="glyphicon <?= $icon ?>"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title"><?= $header ?></h4>
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <abbr title="<?= Yii::$app->formatter->asDatetime($item['datetime']) ?>" class="timeBack"><?= \cs\services\DatePeriod::back($item['datetime']) ?></abbr></small></p>
                            </div>
                            <?php if ($message != '') { ?>
                                <div class="timeline-body">
                                    <?= nl2br($message); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>


            <?php
            $this->registerJs(<<<JS
    $('#buttonSendMessage').click(function() {
        $('#messageModal').modal('show');
        $('#buttonSendMessageForm').click(function() {
            var text = $('#messageModal textarea').val();
            ajaxJson({
                url: '/requests/{$request->getId()}/message',
                data: {
                    text: text
                },
                success: function(ret) {
                    $('#messageModal').modal('hide');
                    window.location.reload();
                }
            });
        });
    });
    $('#buttonAnswerPay').click(function() {
        $('#messageModal').modal('show');
        $('#buttonSendMessageForm').click(function() {
            var text = $('#messageModal textarea').val();
            ajaxJson({
                url: '/requests/{$request->getId()}/answerPay',
                data: {
                    text: text
                },
                success: function(ret) {
                    $('#messageModal').modal('hide');
                    window.location.reload();
                }
            });
        });
    });
    $('#buttonDoneRussia').click(function() {
        $('#messageModal').modal('show');
        $('#buttonSendMessageForm').click(function() {
            var text = $('#messageModal textarea').val();
            ajaxJson({
                url: '/requests/{$request->getId()}/doneRussia',
                data: {
                    text: text
                },
                success: function(ret) {
                    $('#messageModal').modal('hide');
                    window.location.reload();
                }
            });
        });
    });
    $('#buttonDoneWorld').click(function() {
        $('#messageModal').modal('show');
        $('#buttonSendMessageForm').click(function() {
            var text = $('#messageModal textarea').val();
            ajaxJson({
                url: '/requests/{$request->getId()}/doneWorld',
                data: {
                    text: text
                },
                success: function(ret) {
                    $('#messageModal').modal('hide');
                    window.location.reload();
                }
            });
        });
    });
JS
            );
            ?>

            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Сообщение</h4>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control" rows="10"></textarea>
                            <hr>
                            <button class="btn btn-primary" style="width:100%;" id="buttonSendMessageForm">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button class="btn btn-primary" id="buttonSendMessage">Отправить сообщение</button>
            <?php if (in_array($request->getStatus(), [\app\models\Shop\Request::STATUS_ORDER_DOSTAVKA])) { ?>
                <button class="btn btn-primary" id="buttonAnswerPay">Сообщить об оплате</button>
            <?php } ?>
            <?php if (in_array($request->getStatus(), [\app\models\Shop\Request::STATUS_DOSTAVKA_RUSSIA_SEND,])) { ?>
                <button class="btn btn-primary" id="buttonDoneRussia">Заказ получен</button>
            <?php } ?>
            <?php if (in_array($request->getStatus(), [\app\models\Shop\Request::STATUS_DOSTAVKA_WORLD_SEND,])) { ?>
                <button class="btn btn-primary" id="buttonDoneWorld">Заказ получен</button>
            <?php } ?>

        </div>
    </div>
</section>



