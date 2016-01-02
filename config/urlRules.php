<?php

return [
    'subscribe/mail'                        => 'subscribe/mail',
    'subscribe/activate/<code:\\w+>'        => 'subscribe/activate',

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
    'registration/<code:\\w+>'              => 'auth/registration_referal',

    'captcha'                               => 'site/captcha',

    'checkBoxTreeMask/add'                  => 'check_box_tree_mask/add',
    'checkBoxTreeMask/addInto'              => 'check_box_tree_mask/add_into',
    'checkBoxTreeMask/delete'               => 'check_box_tree_mask/delete',

    'upload/upload'                         => 'upload/upload',
    'upload/HtmlContent2'                   => 'html_content/upload',


    '/'                                     => 'site/index',
    'log'                                   => 'site/log',
    'activate/<code:\\w+>'                  => 'site/activate',
    'logDb'                                 => 'site/log_db',
    'contact'                               => 'site/contact',
    'price'                                 => 'site/price',
    'buy/<id:\\d+>'                         => 'site/buy',
    'buy/ajax'                              => 'site/buy_ajax',
    'buy/request/<id:\\d+>'                 => 'site/buy_request',
    'request/success'                       => 'site/request_success',
    'table'                                 => 'site/table',
    'media'                                 => 'site/media',

    'auth'                                  => 'auth/auth',
    'login'                                 => 'site/login',
    'loginAjax'                             => 'site/login_ajax',
    'registrationAjax'                      => 'site/registration_ajax',
    'logout'                                => 'site/logout',

    'products/accelerator'                  => 'products/accelerator',
    'products/keyHeart'                     => 'products/key_heart',

    'about'                                 => 'site/about',
    'search'                                => 'site/search',

    'admin'                                 => 'admin_products/main',
    'admin/products'                        => 'admin_products/index',
    'admin/products/add'                    => 'admin_products/add',
    'admin/products/<id:\\d+>/delete'       => 'admin_products/delete',
    'admin/products/<id:\\d+>'              => 'admin_products/edit',

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