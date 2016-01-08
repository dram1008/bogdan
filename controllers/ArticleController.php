<?php

namespace app\controllers;

use app\models\Article;
use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
use app\models\Shop\Payments;
use app\models\User;
use cs\Application;
use cs\base\BaseController;
use cs\services\Security;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;

class ArticleController extends BaseController
{
    public $layout = 'landing';

    public function actionArhangel_mihail_2016_01()
    {

        return $this->render( [
        ]);
    }

    public function actionUchites_letat()
    {

        return $this->render([
        ]);
    }

    public function actionMerkaba()
    {

        return $this->render([
        ]);
    }

}
