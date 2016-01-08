<?php

namespace app\models\Form\Shop;

use app\models\NewsItem;
use app\models\User;
use app\services\GsssHtml;
use cs\services\Str;
use cs\services\VarDumper;
use Yii;
use yii\base\Model;
use cs\Widget\FileUpload2\FileUpload;
use yii\db\Query;
use yii\helpers\Html;

/**
 */
class Request extends \cs\base\BaseForm
{
    const TABLE = 'bog_shop_requests';

    public $id;
    public $user_id;
    public $product_id;
    public $address;
    public $dostavka;
    public $status;
    public $date_create;
    public $comment;
    public $phone;
    public $is_answer_from_shop;
    public $is_answer_from_client;

    function __construct($fields = [])
    {
        static::$fields = [
            [
                'address',
                'Адрес',
                1,
                'string'
            ],
            [
                'comment',
                'Комментарий',
                0,
                'string',
            ],
            [
                'phone',
                'Телефон',
                0,
                'string',
            ],
            [
                'dostavka',
                'Способ Доставки',
                0,
                'integer',
            ],
        ];
        parent::__construct($fields);
    }

}
