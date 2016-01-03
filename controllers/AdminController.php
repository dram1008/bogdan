<?php

namespace app\controllers;

use app\models\Article;
use app\models\LoginForm;
use app\models\SiteUpdate;
use app\services\Subscribe;
use cs\base\BaseController;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\base\UserException;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

class AdminController extends BaseController
{
    public $layout = 'main';

    public function actionLogin()
    {
        $this->layout = 'main';
        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


}
