<?php

/** @var $request \app\models\Shop\Request */
/** @var $text string */

?>


По вашему заказу пришло сообщение:
<?= $text ?>

Заказ <?= \yii\helpers\Url::to(['site_cabinet/request/item', 'id' => $request->getId()]) ?>
