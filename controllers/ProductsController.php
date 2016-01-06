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

class ProductsController extends BaseController
{
    public $layout = 'landing';



    public function actionAccelerator()
    {
        return $this->render([]);
    }

    public function actionTicket()
    {
        return $this->render([]);
    }

    public function actionKey_heart()
    {
        return $this->render([]);
    }

    public function actionSvidetelstvo()
    {
        return $this->render([]);
    }

    public function actionCar_keeper()
    {
        return $this->render([]);
    }

    public function actionObereg()
    {
        return $this->render([]);
    }

    public function actionPlanet()
    {
        return $this->render([]);
    }

    public function actionStamp()
    {
        return $this->render([]);
    }

    public function actionRod()
    {
        return $this->render([]);
    }


}
