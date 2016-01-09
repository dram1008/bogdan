<?php

/** @var $request \app\models\Shop\Request */

$tickets = $request->getTickets();

?>


Заказ оплачен

Заказ: <?= \yii\helpers\Url::to(['admin_requests/item', 'id' => $request->getId()]) ?>
