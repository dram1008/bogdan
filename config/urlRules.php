<?php

return [
    'cabinet/profile'                       => 'cabinet/profile',
    'requests'                              => 'site_cabinet/requests',
    'requests/<id:\\d+>'                    => 'site_cabinet/request',
    'requests/<id:\\d+>/message'            => 'site_cabinet/order_item_message',
    'requests/<id:\\d+>/answerPay'          => 'site_cabinet/order_item_answer_pay',
    'requests/<id:\\d+>/doneRussia'         => 'site_cabinet/order_item_done_russia',
    'requests/<id:\\d+>/doneWorld'          => 'site_cabinet/order_item_done_world',

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

    'article/arhangelMihail_2016_01'        => 'article/arhangel_mihail_2016_01',
    'article/uchites_letat'                 => 'article/uchites_letat',

    'auth'                                  => 'auth/auth',
    'login'                                 => 'site/login',
    'loginAjax'                             => 'site/login_ajax',
    'registration'                          => 'site/registration',
    'registrationAjax'                      => 'site/registration_ajax',
    'logout'                                => 'site/logout',

    'products/accelerator'                  => 'products/accelerator',
    'products/keyHeart'                     => 'products/key_heart',
    'products/rod'                          => 'products/rod',
    'products/stamp'                        => 'products/stamp',
    'products/planet'                       => 'products/planet',
    'products/obereg'                       => 'products/obereg',
    'products/carKeeper'                    => 'products/car_keeper',
    'products/svidetelstvo'                 => 'products/svidetelstvo',

    'about'                                 => 'site/about',

    'admin'                                 => 'admin_products/main',
    'admin/login'                           => 'admin/login',
    'admin/products'                        => 'admin_products/index',
    'admin/products/add'                    => 'admin_products/add',
    'admin/products/<id:\\d+>/delete'       => 'admin_products/delete',
    'admin/products/<id:\\d+>'              => 'admin_products/edit',

    'admin/pictures'                        => 'admin_pictures/index',
    'admin/pictures/add'                    => 'admin_pictures/add',
    'admin/pictures/<id:\\d+>/delete'       => 'admin_pictures/delete',
    'admin/pictures/<id:\\d+>'              => 'admin_pictures/edit',

    'admin/requests'                        => 'admin_requests/index',
    'admin/requests/add'                    => 'admin_requests/add',
    'admin/requests/<id:\\d+>'              => 'admin_requests/item',
    'admin/requests/<id:\\d+>/delete'       => 'admin_requests/delete',
    'admin/requests/<id:\\d+>/edit'         => 'admin_requests/edit',

    'admin/requests/<id:\\d+>/message'      => 'admin_requests/item_message',
    'admin/requests/<id:\\d+>/newBill'      => 'admin_requests/item_new_bill',
    'admin/requests/<id:\\d+>/answerPay'    => 'admin_requests/item_answer_pay',
    'admin/requests/<id:\\d+>/send'         => 'admin_requests/item_send',
    'admin/requests/<id:\\d+>/done'         => 'admin_requests/item_done',
];