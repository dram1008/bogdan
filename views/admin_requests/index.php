<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;

$this->title = 'Заказы';

$this->registerJs(<<<JS
    $('.buttonDelete').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        if (confirm('Подтвердите удаление')) {
            var button = $(this);
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/requests/' + id + '/delete',
                success: function (ret) {
                    showInfo('Успешно', function() {
                        button.parent().parent().remove();
                    });
                }
            });
        }
    });

    $('.rowTable').click(function() {
        window.location = '/admin/requests/' + $(this).data('id');
    });
JS
);
?>

<div class="container">
    <h1 class="page-header">Заказы</h1>


    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query'      => \app\models\Shop\Request::query()
                ->innerJoin('gs_users', 'gs_users.id = bog_shop_requests.user_id')
                ->select([
                    'bog_shop_requests.*',
                    'gs_users.name_first as user_name_first',
                    'gs_users.avatar as user_avatar',
                    'gs_users.email as user_email',
                    'gs_users.name_last as user_name_last',
                ])
                ->orderBy([
                    'last_message_time' => SORT_DESC,
                ]),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]),
        'tableOptions' => [
            'class' => 'table table-hover table-striped'
        ],
        'rowOptions'   => function ($item) {
            return [
                'role'    => 'button',
                'data-id' => $item['id'],
                'class'   => 'rowTable'
            ];
        },
        'columns'      =>
            [
                'id',
                'address:text:Адрес',
                'phone:text:Телефон',
                [
                    'header'  => 'Пользоватль',
                    'content' => function ($model, $key, $index, $column) {
                        $arr = [];
                        $arr[] = $model['user_email'] . ' ' . $model['user_name_first'] . ' ' . $model['user_name_last'];

                        return join('', $arr);
                    },
                ],
                [
                    'header'  => 'Время создания',
                    'content' => function ($model, $key, $index, $column) {
                        $v = \yii\helpers\ArrayHelper::getValue($model, 'date_create', 0);
                        if ($v == 0) return '';

                        return Html::tag('abbr', \cs\services\DatePeriod::back($v, ['isShort' => true]), ['class' => 'gsssTooltip', 'title' => Yii::$app->formatter->asDatetime($v)]);
                    },
                ],
                [
                    'header'  => 'Время последнего ответа',
                    'content' => function ($model, $key, $index, $column) {
                        $v = \yii\helpers\ArrayHelper::getValue($model, 'last_message_time', 0);
                        if ($v == 0) return '';

                        return Html::tag('abbr', \cs\services\DatePeriod::back($v, ['isShort' => true]), ['class' => 'gsssTooltip', 'title' => Yii::$app->formatter->asDatetime($v)]);
                    },
                ],
                [
                    'header'  => 'Оплачен?',
                    'content' => function ($item) {
                        $v = \yii\helpers\ArrayHelper::getValue($item, 'is_paid', 0);
                        if ($v == 0) return Html::tag('span', 'Нет', ['class' => 'label label-default']);

                        return Html::tag('span', 'Да', ['class' => 'label label-success']);
                    }
                ],
                [
                    'header'  => 'Есть ответ?',
                    'content' => function ($item) {
                        if ($item['is_answer_from_client'] == 1) {
                            return Html::tag('span', Html::tag('span', null, ['class' => 'glyphicon glyphicon-envelope']), ['class' => 'label label-success']);
                        }
                    }
                ],
                [
                    'header'  => 'Удалить',
                    'content' => function ($item) {
                        return Html::button('Удалить', ['class' => 'btn btn-danger btn-xs buttonDelete', 'data-id' => $item['id']]);
                    }
                ],
            ]
    ]) ?>

</div>