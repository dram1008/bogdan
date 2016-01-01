<?php

namespace app\controllers;

use app\models\Article;
use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
use app\models\User;
use cs\Application;
use cs\base\BaseController;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;

class SiteController extends BaseController
{
    public $layout = 'landing';


    /**
     * Выдает форму для оплаты заказа
     *
     * @param int $id bog_shop_requests.id
     *
     * @return string|Response
     * @throws \cs\web\Exception
     */
    public function actionAccelerator($id)
    {
        return $this->render([]);
    }


}
