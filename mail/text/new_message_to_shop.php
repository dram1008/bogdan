<?php

/** @var $request \app\models\Shop\Request */
/** @var $text string */

?>


Пришло сообщение:
<?= $text ?>

Заказ <?= \yii\helpers\Url::to(['admin_requests/item', 'id' => $request->getId()]) ?>
