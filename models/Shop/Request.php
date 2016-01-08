<?php

namespace app\models\Shop;

use app\models\Union;
use app\models\User;
use app\services\Subscribe;
use cs\Application;
use cs\services\BitMask;
use cs\services\Security;
use cs\services\VarDumper;
use cs\web\Exception;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Request extends \cs\base\DbRecord
{
    const TABLE = 'bog_shop_requests';

    const STATUS_USER_NOT_CONFIRMED = 1; // Пользователь заказал с регистрацией пользователя, но не подтвердил свою почту еще
    const STATUS_SEND_TO_SHOP = 2;       // заказ отправлен в магазин
    const STATUS_ORDER_DOSTAVKA = 3;     // клиенту выставлен счет с учетом доставки
    const STATUS_PAID_CLIENT = 5;        // заказ оплачен со стороны клиента
    const STATUS_PAID_SHOP = 6;          // оплата подтверждена магазином
    const STATUS_FINISH_SHOP = 6;          // оплата подтверждена магазином
    const STATUS_FINISH_CLIENT = 6;          // оплата подтверждена магазином
    const STATUS_SEND_TO_USER = 6;          // оплата подтверждена магазином

    // Доставка
    // Забрать на месте полета
    const STATUS_DOSTAVKA_GET_MYSELF_POLET_WAIT = 111; // Ожидает на месте полета
    const STATUS_DOSTAVKA_GET_MYSELF_POLET_DONE = 112; // Подарок получен
    // Самовывоз из Базы Вознесения
    const STATUS_DOSTAVKA_GET_MYSELF_VOZNESENIE_WAIT = 121; // Ожидает на Базе Вознесения
    const STATUS_DOSTAVKA_GET_MYSELF_VOZNESENIE_DONE = 122; // Подарок получен
    // Доставка по Москве
    const STATUS_DOSTAVKA_MOSCOW_WAIT = 131; // Ожидание связи. Наш посланник пытается с вами связаться для передачи подарка
    const STATUS_DOSTAVKA_MOSCOW_DONE = 132; // Подарок вручен
    // Доставка по России
    const STATUS_DOSTAVKA_RUSSIA_PREPARE = 141; // Подготовка к отправке. Подарок находится в режиме подготовки к отправки
    const STATUS_DOSTAVKA_RUSSIA_SEND    = 142; // Подарок отправлен
    const STATUS_DOSTAVKA_RUSSIA_GOT_CLIENT  = 143; // Подарок получен адресатом
    // Доставка по миру
    const STATUS_DOSTAVKA_WORLD_PREPARE = 151; // Подготовка к отправке. Подарок находится в режиме подготовки к отправки
    const STATUS_DOSTAVKA_WORLD_SEND    = 152; // Подарок отправлен
    const STATUS_DOSTAVKA_WORLD_GOT_CLIENT  = 153; // Подарок получен адресатом

    const DIRECTION_TO_CLIENT = 1;
    const DIRECTION_TO_SHOP   = 2;


    public static $statusList = [
        self::STATUS_USER_NOT_CONFIRMED => [
            'client'   => 'Пользователь не подтвердил почту',
            'shop'     => 'Пользователь не подтвердил почту',
            'style'    => 'default',
            'timeLine' => [
                'icon'  => 'glyphicon-minus',
                'color' => 'default',
            ],
        ],
        self::STATUS_SEND_TO_SHOP       => [
            'client'   => 'Отпрален в магазин',
            'shop'     => 'Пользователь отправил заказ',
            'style'    => 'primary',
            'timeLine' => [
                'icon'  => 'glyphicon-ok',
                'color' => 'default',
            ],
        ],
        self::STATUS_ORDER_DOSTAVKA     => [
            'client'   => 'Выставлен счет с учетом доставки',
            'shop'     => 'Клиенту выставлен счет с учетом доставки',
            'style'    => 'primary',
            'timeLine' => [
                'icon'  => 'glyphicon-credit-card',
                'color' => 'warning',
            ],
        ],
        self::STATUS_PAID_SHOP          => [
            'client'   => 'Оплата подтверждена',
            'shop'     => 'Оплата подтверждена',
            'style'    => 'primary',
            'timeLine' => [
                'icon'  => 'glyphicon-credit-card',
                'color' => 'success',
            ],
        ],
        self::STATUS_PAID_CLIENT        => [
            'client'   => 'Оплата сделана',
            'shop'     => 'Оплата сделана',
            'style'    => 'primary',
            'timeLine' => [
                'icon'  => 'glyphicon-credit-card',
                'color' => 'success',
            ],
        ],
        self::STATUS_FINISH_SHOP        => [
            'client'   => 'Заказ выполнен',
            'shop'     => 'Заказ выполнен',
            'style'    => 'success',
            'timeLine' => [
                'icon'  => 'glyphicon-thumbs-up',
                'color' => 'success',
            ],
        ],
        self::STATUS_FINISH_CLIENT      => [
            'client'   => 'Заказ получен',
            'shop'     => 'Заказ получен',
            'style'    => 'success',
            'timeLine' => [
                'icon'  => 'glyphicon-thumbs-up',
                'color' => 'success',
            ],
        ],
        self::STATUS_SEND_TO_USER       => [
            'client'   => 'Отправлен клиенту',
            'shop'     => 'Отправлен клиенту',
            'style'    => 'success',
            'timeLine' => [
                'icon'  => 'glyphicon glyphicon-plane',
                'color' => 'warning',
            ],
        ],
        self::STATUS_DOSTAVKA_GET_MYSELF_POLET_WAIT       => [
            'client'   => 'Ожидает на месте полета',
            'shop'     => 'Ожидает на месте полета',
            'style'    => 'success',
            'timeLine' => [
                'icon'  => 'glyphicon glyphicon-plane',
                'color' => 'warning',
            ],
        ],
    ];


    public static $dostavkaList = [
        1 => "На месте полета",
        2 => "Самовывоз",
        3 => "Доставка по Москве",
        4 => "Доставка по России",
        5 => "Доставка по миру",
    ];

    /**
     * @param array $fields
     * @return \app\models\Shop\Request
     */
    public static function insert($fields = [])
    {
        if (!isset($fields['user_id'])) {
            $fields['user_id'] = \Yii::$app->user->id;
        }
        $fields['date_create'] = time();

        return parent::insert($fields);
    }

    /**
     * Добавить статус
     *
     * @param int | array $status статус self::STATUS_* или массив со статусом и сообщением
     * @param int $direction направление сообщения self::DIRECTION_*
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addStatus($status, $direction)
    {
        if (!is_array($status)) {
            $fields = [
                'status' => $status,
            ];
        } else {
            $fields = $status;
        }

        return $this->addMessageItem($fields, $direction);
    }

    /**
     * Добавить статус к клиенту
     *
     * @param int | array $status статус self::STATUS_* или массив со статусом и сообщением
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addStatusToClient($status)
    {
        if (!is_array($status)) {
            $fields = [
                'status' => $status,
            ];
        } else {
            $fields = $status;
        }

        return $this->addMessageItem($fields, self::DIRECTION_TO_CLIENT);
    }

    /**
     *
     *
     * @return mixed | string
     */
    public function getDostavkaText()
    {
        $d = $this->getField('dostavka');
        if (is_null($d)) {
            return '';
        }

        return ArrayHelper::getValue(self::$dostavkaList, $d, '');
    }

    /**
     * Устанавливает статус для заказа "Оплата подтверждена магазином" self::STATUS_PAID_SHOP
     * Прикрепляет билеты для заказа
     *
     * @param string $message - сообщение для статуса
     *
     * @return bool
     */
    public function paid($message = null)
    {
        // выдача билетов
        $tickets_counter = $this->getProduct()->getField('tickets_counter');
        for ($i = 0; $i < $tickets_counter; $i++) {
            Ticket::insert([
                'request_id'  => $this->getId(),
                'code'        => substr(str_shuffle("012345678901234567890123456789"), 0, 12),
                'date_insert' => time(),
            ]);
        }
        $this->addStatusToShop(self::STATUS_PAID_CLIENT);
        $this->addStatusToClient(self::STATUS_PAID_SHOP);
        $this->update(['is_paid' => 1]);
        $dostavka = $this->getField('dostavka');
        switch($dostavka) {
            case 1:
                $this->addStatusToClient(self::STATUS_DOSTAVKA_GET_MYSELF_POLET_WAIT);
                break;
            case 2:
                $this->addStatusToClient(self::STATUS_DOSTAVKA_GET_MYSELF_VOZNESENIE_WAIT);
                break;
            case 3:
                $this->addStatusToClient(self::STATUS_DOSTAVKA_MOSCOW_WAIT);
                break;
            case 4:
                $this->addStatusToClient(self::STATUS_DOSTAVKA_RUSSIA_PREPARE);
                break;
            case 5:
                $this->addStatusToClient(self::STATUS_DOSTAVKA_RUSSIA_PREPARE);
                break;
        }

        // отправка письма
        Application::mail($this->getClient()->getEmail(), 'Ваш подарок', 'new_request_client', [
            'request' => $this
        ]);
        // прибавление счетчика
        \app\models\Counter::inc($this->getProduct()->getPrice());

        return true;
    }

    /**
     * Добавить статус в магазин
     *
     * @param int | array $status статус self::STATUS_* или массив со статусом и сообщением
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addStatusToShop($status)
    {
        if (!is_array($status)) {
            $fields = [
                'status' => $status,
            ];
        } else {
            $fields = $status;
        }

        return $this->addMessageItem($fields, self::DIRECTION_TO_SHOP);
    }

    /**
     * Добавить сообщение
     *
     * @param string $message сообщение
     * @param int $direction направление сообщения self::DIRECTION_*
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addMessage($message, $direction)
    {
        return $this->addMessageItem([
            'message' => $message,
        ], $direction);
    }

    /**
     * Добавить сообщение для клиента
     *
     * @param string $message сообщение
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addMessageToClient($message)
    {
        return $this->addMessage($message, self::DIRECTION_TO_CLIENT);
    }

    /**
     * Добавить сообщение для клиента
     *
     * @param string $message сообщение
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addMessageToShop($message)
    {
        return $this->addMessage($message, self::DIRECTION_TO_SHOP);
    }

    /**
     * Добавить сообщение или статус
     *
     * @param array $fields поля для сообщения
     * @param int $direction направление сообщения self::DIRECTION_*
     *
     * @return \app\models\Shop\RequestMessage
     */
    public function addMessageItem($fields, $direction)
    {
        $fieldsRequest = [
            'is_answer_from_shop'   => ($direction == self::DIRECTION_TO_CLIENT) ? 1 : 0,
            'is_answer_from_client' => ($direction == self::DIRECTION_TO_CLIENT) ? 0 : 1,
            'last_message_time'     => time(),
        ];
        if (isset($fields['status'])) {
            $fieldsRequest['status'] = $fields['status'];
        }
        $this->update($fieldsRequest);

        return RequestMessage::insert(ArrayHelper::merge($fields, [
            'request_id' => $this->getId(),
            'direction'  => $direction,
            'datetime'   => time(),
        ]));
    }

    /**
     * Добавляет заказ
     *
     * @param $fields array поля заказа
     * @param $productList array список продуктов в заказе
     * [
     *    [
     * 'id'     => int,
     * 'count'  => int,
     *    ], ...
     * ]
     * @return self
     */
    public static function add($fields, $productList, $status = self::STATUS_SEND_TO_SHOP)
    {
        $request = self::insert($fields);
        foreach ($productList as $item) {
            RequestProduct::insert([
                'request_id' => $request->getId(),
                'product_id' => $item['id'],
                'count'      => $item['count'],
            ]);
        }
        $message = $request->addStatus($status, self::DIRECTION_TO_SHOP);

        return $request;
    }

    /**
     * Возвращает заготовку запроса для сообщений для заказа
     * gs_users_shop_requests_messages.*
     *
     * @return \yii\db\Query
     */
    public function getMessages()
    {
        return RequestMessage::query(['request_id' => $this->getId()]);
    }

    /**
     * Возвращает объект клиента
     *
     * @return \app\models\User | null
     * @throws \cs\web\Exception
     */
    public function getUser()
    {
        $u = User::find($this->getField('user_id'));
        if (is_null($u)) {
            throw new Exception('Не найден пользователь');
        }

        return $u;
    }

    /**
     * Возвращает объект клиента
     *
     * @return \app\models\User | null
     */
    public function getClient()
    {
        return $this->getUser();
    }

    public function getStatus()
    {
        return $this->getField('status');
    }

    /**
     * @return array
     */
    public function getTickets()
    {
        return Ticket::query(['request_id' => $this->getId()])->all();
    }


    /**
     * @return \app\models\Shop\Product
     */
    public function getProduct()
    {
        $product = Product::find($this->getField('product_id'));

        return $product;
    }
}