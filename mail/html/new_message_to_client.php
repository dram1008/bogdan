<?php

/** @var $request \app\models\Shop\Request */
/** @var $text string */

?>


<p>По вашему заказу пришло сообщение:</p>
<p><?= nl2br($text) ?></p>

<p><a href="<?= \yii\helpers\Url::to(['site_cabinet/request/item', 'id' => $request->getId()]) ?>">Заказ</a></p>
