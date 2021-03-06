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
        $login = strtolower(self::getParam('login'));
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
     * - name - string
     *
     * @return array|string|Response
     */
    public function actionRegistration_ajax()
    {
        $login = strtolower(self::getParam('login'));
        $name = self::getParam('name');

        if (User::query(['email' => $login])->exists()) {
            return self::jsonErrorId(101, 'Пользователь уже существует');
        }
        $user = User::registration($login, substr(str_shuffle("01234567890123456789"), 0, 4), [
            'name_first' => $name,
        ]);
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

    public function actionSutra()
    {
        return $this->render([]);
    }

    /**
     * @param int $id product_id bog_shop_product.id
     * @return string|Response
     */
    public function actionBuy($id)
    {
        return $this->render([
            'model' => new \app\models\Form\Shop\Request(),
            'id'    => $id,
        ]);
    }

    /**
     * Оплата проведена успешно
     *
     * @param int $id идентификатор заказа
     * @return string|Response
     */
    public function actionBuy_success($id)
    {
        $request = \app\models\Shop\Request::find($id);
        $request->paid();

        return self::jsonSuccess();
    }

    /**
     * Оплата проведена успешно
     *
     * @param int $id идентификатор билета
     * @return string|Response
     * @throws \cs\web\Exception
     */
    public function actionTicket($id)
    {
        if (Yii::$app->user->isGuest) {
            throw new Exception('Нужно авторизоваться перед просмотром билета');
        }
        $ticket = \app\models\Shop\Ticket::find($id);
        if (is_null($ticket)) {
            throw new Exception('Не найден такой билет');
        }
        $request = \app\models\Shop\Request::find($ticket->getField('request_id'));
        if (is_null($ticket)) {
            throw new Exception('Не найден заказ для билета');
        }
        if ($request->getField('user_id') != Yii::$app->user->id) {
            throw new Exception('Это не ваш билет');
        }

        $this->layout = 'blank';
        return $this->render([
            'ticket' => $ticket,
            'request' => $request,
        ]);
    }

    /**
     * AJAX
     *
     * REQUEST
     * - id - int - идентификатор продукта
     * - comment - string
     * - dostavka - int -
     * - address - string -
     * - price - int - полная цена заказа с учетом доставки
     * - phone - string - телефон
     *
     * @return string|Response
     */
    public function actionBuy_ajax()
    {
        $fields['product_id'] = self::getParam('id');
        $fields['comment'] = self::getParam('comment');
        $fields['address'] = self::getParam('address');
        $fields['dostavka'] = self::getParam('dostavka');
        $fields['price'] = self::getParam('price');
        $fields['phone'] = self::getParam('phone');

        $item = \app\models\Shop\Request::insert($fields);
        $item->addStatusToShop(\app\models\Shop\Request::STATUS_SEND_TO_SHOP);
        $message = [
            'Стоимость с учетом доставки: ' . $fields['price'],
            'Доставка: ' . \app\models\Shop\Request::$dostavkaList[$fields['dostavka']],
            (in_array($fields['dostavka'],[3,4,5]))? 'Адрес: ' . $fields['address']  : '',
        ];
        if ($fields['price'] > 15000) {
            $message = ArrayHelper::merge($message, [
                'Наши реквизиты:',
                '1. Карта Альфа Банка. Номер карты 4154 8120 0278 5743',
                '2. Карта СберБанка 4276 3800 2175 1719',
                '3. PayPal Идентификатор: dram1008@yandex.ru',
                '4. Yandex Money. Номер кошелька: 410011473018906',
                '5. По ссылке http://www.galaxysss.ru/thank',
                '<button class="btn btn-primary buttonAnswerPay" style="margin-top: 20px;">Сообщить об оплате</button>',
            ]);
        }
        $item->addStatusToClient([
            'status' => \app\models\Shop\Request::STATUS_ORDER_DOSTAVKA,
            'message' => join("\n", $message),

        ]);

        // отправка письма
//        Application::mail($item->getClient()->getEmail(), 'Ваш подарок', 'new_request_client', [
//            'request' => $item
//        ]);

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
        Yii::info('isPaid='.\yii\helpers\VarDumper::dumpAsString($request->isPaid()), 'bog\\buy\\request');
        if ($request->isPaid()) {
            return $this->redirect(['site_cabinet/request', 'id' => $request->getId()]);
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

    public function actionAngel()
    {
        return $this->render([
        ]);
    }

    public function actionDostavka()
    {
        return $this->render([
        ]);
    }

    /**
     * @param int $id request id
     * @return \yii\web\Response json
     */
    public function actionRequest_is_paid($id)
    {
        $request = \app\models\Shop\Request::find($id);
        if (is_null($request)) {
            return self::jsonErrorId(101, 'Не найден заказ');
        }
        Yii::info('check request->isPaid = '. \yii\helpers\VarDumper::dumpAsString($request->isPaid()), 'bog\\\app\\controllers\\SiteController::actionRequest_is_paid()');

        return self::jsonSuccess($request->isPaid());
    }

    /**
     * Проверка целостности полей и подлинности
     *
     * @param array $fields поля
     * @param string $notification_secret секретный код от Яндекса
     *
     * @return bool
     */
    private function isValidSha1($fields, $notification_secret)
    {
        // notification_type&operation_id&amount&currency&datetime&sender&codepro&notification_secret&label
        $arr = [
            'notification_type',
            'operation_id',
            'amount',
            'currency',
            'datetime',
            'sender',
            'codepro',
            'notification_secret',
            'label',
        ];
        $str = [];
        foreach($arr as $i) {
            if ($i == 'notification_secret') {
                $str[] = $notification_secret;
            } else {
                $str[] = ArrayHelper::getValue($fields, $i, '');
            }
        }
        $str = join('&', $str);
        $sha1 = sha1($str);

        $sha1Fields = ArrayHelper::getValue($fields, 'sha1_hash', '');
        if ($sha1Fields == '') return false;

        return $sha1Fields == $sha1;
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

    public function actionCopyright()
    {
        return $this->render([]);
    }

    public function actionHologram()
    {
        return $this->render([]);
    }

}
