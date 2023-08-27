<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'timeZone' => 'Europe/Minsk',
    'defaultRoute' => 'tasks/index',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'language' => 'ru',

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '0CjeX-b5TeMDjBperkByJ4xxOHcKIOWa',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
               // 'google' => [
                //     'class' => 'yii\authclient\clients\GoogleOpenId'
                //  ],
                //'facebook' => [
                //    'class' => 'yii\authclient\clients\Facebook',
                //    'clientId' => 'facebook_client_id',
                //    'clientSecret' => 'секретный_ключ_facebook_client',
                //  ],
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => 51625219,
                    'clientSecret' => 'hYqoXJUXvrFmjycK2xED',
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '959471675584-i7bih4ta0dhvr3sppdsaoqfojmdjq208.apps.googleusercontent.com',
                    'clientSecret' => 'l8sdJwEbo3ZBNp461N-XQbsA',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            //'baseUrl'=>'web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            'rules' => [
                'tasks/add-reply/<id:\d+>' => 'tasks/add-reply',
                'tasks/rejected-task/<id:\d+>' => 'tasks/rejected-task',
                'tasks/finish-task/<id:\d+>' => 'tasks/finish-task',
                'tasks/rejectedtask' => 'tasks/view/\d+',
                'tasks/view/<id:\d+>' => 'tasks/view',
                'user/view/<id:\d+>' => 'user/view',
                'site/tasks' => 'tasks/index',
                '/my-tasks' => 'tasks/my-tasks',
                'tasks/tasks' => 'tasks/index',

            ],
        ],

    ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
