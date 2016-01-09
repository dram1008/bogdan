<?php

namespace app\controllers;

use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
use app\models\Product;
use app\models\User;
use cs\Application;
use cs\base\BaseController;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;

class Site_cabinetController extends BaseController
{
    public $layout = 'landing';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionRequests()
    {
        return $this->render([
            'items' => \app\models\Shop\Request::query(['bog_shop_requests.user_id' => \Yii::$app->user->id])
                ->select([
                    'bog_shop_requests.*',
                    'bog_shop_product.name as product_name',
                    'bog_shop_product.image as product_image',
                ])
                ->innerJoin('bog_shop_product', 'bog_shop_product.id = bog_shop_requests.product_id')
                ->all(),
        ]);
    }

    public function actionRequest($id)
    {
        $item = \app\models\Shop\Request::find($id);
        if (is_null($item)) {
            throw new Exception('Заказ не найден');
        }

        return $this->render([
            'request' => $item,
        ]);
    }

    /**
     * AJAX
     * Отправляет сообщение к заказу для клиента
     *
     * REQUEST:
     * - text - string - текст сообщения
     *
     * @param int $id  идентификатор заказа gs_users_shop_requests.id
     *
     * @return \yii\web\Response json
     */
    public function actionOrder_item_message($id)
    {
        $text = self::getParam('text');
        $request = \app\models\Shop\Request::find($id);
        if ($request->getField('user_id') != Yii::$app->user->id) {
            return self::jsonErrorId(101, 'Это не ваш заказ');
        }
        $request->addMessageToShop($text);
        Application::mail(\Yii::$app->params['mailer']['payment'], 'Новое сообщение', 'new_message_to_shop', [
            'request' => $request,
            'text' => $text,
        ]);

        return self::jsonSuccess();
    }


    public function actionPassword_change()
    {
        $model = new \app\models\Form\PasswordNew();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->action(\Yii::$app->user->identity)) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }

    /**
     * Заготовка для отправки статуса с сообщением
     *
     * REQUEST:
     * - text - string - текст сообщения
     *
     * @param int $id  идентификатор заказа gs_users_shop_requests.id
     * @param int $status  статус
     *
     * @return \yii\web\Response json
     */
    private function sendStatus($id, $status)
    {
        $text = self::getParam('text');
        $request = \app\models\Shop\Request::find($id);
        if ($request->getField('user_id') != Yii::$app->user->id) {
            return self::jsonErrorId(101, 'Это не ваш заказ');
        }
        $request->addStatusToShop([
            'message' => $text,
            'status'  => $status,
        ]);

        return self::jsonSuccess();
    }

    /**
     * AJAX
     * Отправляет сообщение для клиента: STATUS_DOSTAVKA_RUSSIA_GOT_CLIENT
     *
     * REQUEST:
     * - text - string - текст сообщения
     *
     * @param int $id  идентификатор заказа gs_users_shop_requests.id
     *
     * @return \yii\web\Response json
     */
    public function actionOrder_item_done_russia($id)
    {
        return $this->sendStatus($id, \app\models\Shop\Request::STATUS_DOSTAVKA_RUSSIA_GOT_CLIENT);
    }

    /**
     * AJAX
     * Отправляет сообщение для клиента: STATUS_DOSTAVKA_WORLD_GOT_CLIENT
     *
     * REQUEST:
     * - text - string - текст сообщения
     *
     * @param int $id  идентификатор заказа gs_users_shop_requests.id
     *
     * @return \yii\web\Response json
     */
    public function actionOrder_item_done_world($id)
    {
        return $this->sendStatus($id, \app\models\Shop\Request::STATUS_DOSTAVKA_WORLD_GOT_CLIENT);
    }

    /**
     * AJAX
     * Отправляет сообщение для клиента: Оплата сделана
     *
     * REQUEST:
     * - text - string - текст сообщения
     *
     * @param int $id  идентификатор заказа gs_users_shop_requests.id
     *
     * @return \yii\web\Response json
     */
    public function actionOrder_item_answer_pay($id)
    {
        return $this->sendStatus($id, \app\models\Shop\Request::STATUS_PAID_CLIENT);
    }

}
