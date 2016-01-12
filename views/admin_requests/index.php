<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;

$this->title = 'Заказы';

$this->registerJs(<<<JS
$('.buttonDelete').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите удаление')) {
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/articleList/' + id + '/delete',
                success: function (ret) {
                    infoWindow('Успешно', function() {
                        $('#newsItem-' + id).remove();
                    });
                }
            });
        }
    });

    // Сделать рассылку
    $('.buttonAddSiteUpdate').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите')) {
            var buttonSubscribe = $(this);
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/articleList/' + id + '/subscribe',
                success: function (ret) {
                    infoWindow('Успешно', function() {
                        buttonSubscribe.remove();
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
                    'is_answer_from_client' => SORT_DESC,
                    'last_message_time'     => SORT_DESC,
                ]),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]),
        'tableOptions' => [
            'class' => 'table table-hover table-striped'
        ],
        'rowOptions' => function($item) {
            return [
                'role' => 'button',
                'data-id' => $item['id'],
                'class' => 'rowTable'
            ];
        },
        'columns' =>
        [
            [
                'class' => 'yii\grid\SerialColumn', // <-- here
                // you may configure additional properties here
            ],
            'id',
            'address',
            'phone',
            [
                'header' => 'Пользоватль',
                'content' => function ($model, $key, $index, $column) {
                    $arr = [];
                    $avatar = \yii\helpers\ArrayHelper::getValue($model, 'user_avatar', '/images/iam.png');
                    $arr[] = Html::img($avatar, ['width' => 50]);
                    $arr[] = $model['user_email'] . ' ' . $model['user_name_first'] . ' ' . $model['user_name_last'];

                    return join('',$arr);
                },
            ],
            [
                'header' => 'Время создания',
                'content' => function ($model, $key, $index, $column) {
                    return Yii::$app->formatter->asDatetime($model['date_create']);
                },
            ],
            [
                'header' => 'Время последнего ответа',
                'content' => function ($model, $key, $index, $column) {
                    return Yii::$app->formatter->asDatetime($model['last_message_time']);
                },
            ],
            [
                'header' => 'Комментарий',
                'content' => function ($model, $key, $index, $column) {
                    return Html::tag('pre', nl2br($model['comment']));
                },
            ],
            [
                'header' => 'Еслт ответ?',
                'content' => function($item) {
                    if ($item['is_answer_from_client'] == 1) {
                        return Html::tag('span',null,['class' => 'glyphicon glyphicon-envelope']);
                    }
                }
            ],
        ]
    ]) ?>

</div>