<?php

/** @var $request \app\models\Shop\Request */

$tickets = $request->getTickets();

?>


<p>Поздравляем вы сделали первый шаг к своему полю коллективного счастья</p>

<p>Ваши билеты:</p>

<?php foreach($tickets as $t) { ?>
    <p><a href="<?= \yii\helpers\Url::to(['site/ticket', 'id' => $t['id']], true) ?>">Билет #<?= $t['id'] ?> (<?= $t['code'] ?>)</p>
<?php } ?>

<p>Билеты вы можете распечатать в личном кабинете.</p>
