<?php

/** @var $request \app\models\Shop\Request */
/** @var $text string */

?>


<p>Пришло сообщение:</p>
<p><?= nl2br($text) ?></p>

<p><a href="<?= \yii\helpers\Url::to(['admin_requests/item', 'id' => $request->getId()]) ?>">Заказ</a></p>
