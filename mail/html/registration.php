<?php
/**
 * @var $url string
 * @var $user \app\models\user
 * @var $datetime string
 */
?>
<p>Вы були зарегистрированы</p>
<p>Ваш пароль для входа в личный кабинет: <?= $user->getField('password') ?></p>
<p>Вам необходимо активировать свой аккаунт по ссылке: <?= $url ?>. только после этого вы смоете войти в кабинет и получить свои билеты.</p>