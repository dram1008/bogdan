<?php

namespace app\models\Shop;

use app\models\Union;
use app\services\Subscribe;
use cs\services\BitMask;
use yii\db\Query;
use yii\helpers\Url;

class Product extends \cs\base\DbRecord
{
    const TABLE = 'bog_shop_product';

    /**
     * Возвращает картинку
     * @param bool $isScheme
     * @return string
     */
    public function getImage($isScheme = false)
    {
        $url = $this->getField('image', '');
        if ($url == '') return '';

        return Url::to($url, $isScheme);
    }

    public function accept()
    {
        $this->update(['moderation_status' => 1]);
    }

    public function reject()
    {
        $this->update(['moderation_status' => 0]);
    }

}