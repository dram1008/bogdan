<?php

/** @var $request \app\models\Shop\Request */
/** @var $text string */

?>


<p>Пришло сообщение:</p>
<p><?= nl2br($text) ?></p>
<?= \yii\helpers\Url::to(['admin_requests/item', 'id' => $request->getId()]) ?>

<p><a href="<?= \yii\helpers\Url::to(['admin_requests/item', 'id' => $request->getId()]) ?>">Заказ</a></p>
