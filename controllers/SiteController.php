<?php

namespace app\controllers;

use app\models\Article;
use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
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
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;

class SiteController extends BaseController
{
    public $layout = 'landing';

    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render([
        ]);
    }

    public function actionTable()
    {

        return $this->render([
        ]);
    }

    public function actionPrice()
    {
        return $this->render([]);
    }

    public function actionAbout()
    {
        return $this->render();
    }

    public function actionActivate($code)
    {
        $row = \app\services\RegistrationDispatcher::query(['code' => $code])->one();
        if ($row === false) {
            throw new Exception('Нет такого кода или уже устарел');
        }
        $model = new NewPassword();
        $user = User::find($row['parent_id']);
        if ($model->load(Yii::$app->request->post()) && $model->update($user)) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            \app\services\RegistrationDispatcher::delete($row['parent_id']);

            \Yii::$app->user->login($user);

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }

        return $this->render();
    }

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

    /**
     * AJAX
     *
     * RESPONSE:
     * - login - string
     * - password - string
     *
     * @return array|string|Response
     */
    public function actionLogin_ajax()
    {
        $login = self::getParam('login');
        $password = self::getParam('password');

        $user = User::find(['email' => $login]);
        if (is_null($user)) {
            return self::jsonErrorId(101, 'Пользователь не найден');
        }
        if (!$user->validatePassword($password)) {
            return self::jsonErrorId(102, 'Не верный пароль');
        }
        Yii::$app->user->login($user);

        return self::jsonSuccess();
    }

    /**
     * AJAX
     *
     * RESPONSE:
     * - login - string
     * - password - string
     *
     * @return array|string|Response
     */
    public function actionRegistration_ajax()
    {
        $login = self::getParam('login');

        $user = User::find(['email' => $login]);
        if ($user) {
            return self::jsonErrorId(101, 'Пользователь уж существует');
        }
        $user = User::registration($login, Security::generateRandomString());
        Yii::$app->user->login($user);

        return self::jsonSuccess();
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionMedia()
    {
        return $this->render([]);
    }

    /**
     * @param int $id product_id bog_shop_product.id
     * @return string|Response
     */
    public function actionBuy($id)
    {
        $model = new \app\models\Form\Shop\Request();
        if ($model->load(Yii::$app->request->post()) && ($fields = $model->insert2($id))) {
            return $this->redirect(Url::to(['site/buy_request', 'id' => $fields['id']]));
        } else {
            return $this->render([
                'model' => $model,
                'id'    => $id,
            ]);
        }
    }

    /**
     * AJAX
     *
     * REQUEST
     * - id - int - идентификатор продукта
     * - comment - string
     * - dostavka - int -
     * - address - string -
     * - price - int -
     *
     * @return string|Response
     */
    public function actionBuy_ajax()
    {
        $fields['product_id'] = self::getParam('id');
        $fields['comment'] = self::getParam('comment');
        $fields['address'] = self::getParam('address');

        $item = \app\models\Shop\Request::insert($fields);
        $item->addStatusToShop(\app\models\Shop\Request::STATUS_SEND_TO_SHOP);

        return self::jsonSuccess($item->getId());
    }

    /**
     * Выдает форму для оплаты заказа
     *
     * @param int $id bog_shop_requests.id
     *
     * @return string|Response
     * @throws \cs\web\Exception
     */
    public function actionBuy_request($id)
    {
        $request = \app\models\Shop\Request::find($id);
        if (is_null($request)) {
            throw new Exception('Нет такого заказа');
        }

        return $this->render([
            'request'    => $request,
        ]);
    }

    public function actionLog()
    {
        return $this->render([
            'log' => file_get_contents(Yii::getAlias('@runtime/logs/app.log')),
        ]);
    }

    /**
     * Прием денег из яндекса
     *
     * @return string
     */
    public function actionRequest_success()
    {
        $secretCode = 'Wre4ZX0X3vDc1aEHElOvsOof';

    // живой платеж
//        'notification_type' => 'card-incoming'
//        'amount' => '19.60'
//        'datetime' => '2015-12-28T15:38:38Z'
//        'codepro' => 'false'
//        'withdraw_amount' => '20.00'
//        'sender' => ''
//        'sha1_hash' => '4bf0ac57f8a86653914d68ba28a3a02c99780eed'
//        'unaccepted' => 'false'
//        'operation_label' => '1e136b24-0002-5000-8033-8fa644e381dd'
//        'operation_id' => '504632318089016012'
//        'currency' => '643'
//        'label' => '1231'


//        пример
//        'notification_type' => 'p2p-incoming'
//        'amount' => '138.29'
//        'datetime' => '2015-12-27T20:28:51Z'
//        'codepro' => 'false'
//        'sender' => '41001000040'
//        'sha1_hash' => '163ca7ebf6685d84db11985cd06df592301a1b20'
//        'test_notification' => 'true'
//        'operation_label' => ''
//        'operation_id' => 'test-notification'
//        'currency' => '643'
//        'label' => ''

        Application::mail('dram1008@yandex.ru','yandexMoney','yandex_money',[
            'post' => Yii::$app->request->post(),
        ]);
    }

    public function actionLog_db()
    {
        $query = Log::query()->orderBy(['log_time' => SORT_DESC]);
        $category = self::getParam('category', '');
        if ($category) {
            $query->where(['like', 'category', $category . '%', false]);
        }
        $type = self::getParam('type', '');
        if ($type) {
            switch ($type) {
                case 'INFO':
                    $type = \yii\log\Logger::LEVEL_INFO;
                    break;
                case 'ERROR':
                    $type = \yii\log\Logger::LEVEL_ERROR;
                    break;
                case 'WARNING':
                    $type = \yii\log\Logger::LEVEL_WARNING;
                    break;
                case 'PROFILE':
                    $type = \yii\log\Logger::LEVEL_PROFILE;
                    break;
                default:
                    $type = null;
                    break;
            }
            if ($type) {
                $query->where(['type' => $type]);
            }
        }

        return $this->render([
            'dataProvider' => new ActiveDataProvider([
                'query'      => $query,
                'pagination' => [
                    'pageSize' => 50,
                ],
            ])
        ]);
    }

    public function actionRent()
    {
        return $this->render([]);
    }

    public function actionDostavka()
    {
        return $this->render([]);
    }

    public function actionDiller()
    {
        return $this->render([]);
    }

    public function actionHouse()
    {
        return $this->render([]);
    }
}
