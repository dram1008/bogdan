<?php

return [
    'cabinet/profile'                       => 'cabinet/profile',
    'requests'                              => 'site_cabinet/requests',
    'requests/<id:\\d+>'                    => 'site_cabinet/request',
    'requests/<id:\\d+>/message'            => 'site_cabinet/order_item_message',
    'requests/<id:\\d+>/answerPay'          => 'site_cabinet/order_item_answer_pay',
    'requests/<id:\\d+>/done'               => 'site_cabinet/order_item_done',

    'cabinet/passwordChange'                => 'cabinet/password_change',
    'cabinet/changeEmail'                   => 'cabinet/change_email',
    'changeEmail/activate/<code:\\w+>'      => 'auth/change_email_activate',


    'password/recover'                      => 'auth/password_recover',
    'password/recover/activate/<code:\\w+>' => 'auth/password_recover_activate',
    'registration/<code:\\w+>'              => 'auth/registration_activate',

    'captcha'                               => 'site/captcha',

    'upload/upload'                         => 'upload/upload',
    'upload/HtmlContent2'                   => 'html_content/upload',


    '/'                                     => 'site/index',
    'log'                                   => 'site/log',
    'activate/<code:\\w+>'                  => 'site/activate',
    'logDb'                                 => 'site/log_db',
    'contact'                               => 'site/contact',
    'price'                                 => 'site/price',
    'buy/<id:\\d+>'                         => 'site/buy',
    'buy/<id:\\d+>/success'                 => 'site/buy_success',
    'buy/ajax'                              => 'site/buy_ajax',
    'request/success'                       => 'site/request_success',
    'table'                                 => 'site/table',
    'media'                                 => 'site/media',
    'copyright'                             => 'site/copyright',
    'hologram'                              => 'site/hologram',
    'ticket/<id:\\d+>'                      => 'site/ticket',
    'article/why'                           => 'article/why',

    'auth'                                  => 'auth/auth',
    'login'                                 => 'site/login',
    'loginAjax'                             => 'site/login_ajax',
    'registration'                          => 'site/registration',
    'registrationAjax'                      => 'site/registration_ajax',
    'logout'                                => 'site/logout',

    'products/accelerator'                  => 'products/accelerator',
    'products/keyHeart'                     => 'products/key_heart',

    'about'                                 => 'site/about',
];