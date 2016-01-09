<?php

/** @var $request \app\models\Shop\Request */

$tickets = $request->getTickets();

?>


<p>Заказ оплачен</p>

<p><a href="<?= \yii\helpers\Url::to(['admin_requests/item', 'id' => $request->getId()]) ?>">Заказ</a></p>
