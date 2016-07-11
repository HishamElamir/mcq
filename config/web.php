<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'gii' => 'yii\gii\Module',
        'gridview' => ['class' => '\kartik\grid\Module'],
        'reports' => ['class' => '\app\modules\reports\Module'],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'auth' => [
            'class' => 'app\modules\auth\Module',
        ],
        'teacher' => [
            'class' => 'app\modules\teacher\Teacher',
        ],
        'student' => [
            'class' => 'app\modules\student\Module',
        ],
        'activities' => [
            'class' => 'app\modules\activities\Module',
        ],
        'reports' => [
            'class' => 'app\modules\reports\Module',
        ],
    ],
    'components' => [

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mcq-quizzes',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'authManger' => ['class' => 'yii\rbac\DbManager'],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'Paypal' => array(
            'class' => 'app\components\Paypal',
            'apiUsername' => 'businesshamdy506_api1.gmail.com',
            'apiPassword' => '5AYB5H8355HQRA6X',
            'apiSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31Axq6483IiT.Z-y.LWjeblsp88Yob',
            'apiLive' => false,
            'returnUrl' => 'paypal/confirm/', //regardless of url management component
            'cancelUrl' => 'paypal/cancel/', //regardless of url management component
            // Default currency to use, if not set USD is the default
            'currency' => 'USD',
        // Default description to use, defaults to an empty string
        //'defaultDescription' => '',
        // Default Quantity to use, defaults to 1
        //'defaultQuantity' => '1',
        //The version of the paypal api to use, defaults to '3.0' (review PayPal documentation to include a valid API version)
        //'version' => '3.0',
        ),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    /*
      // configuration adjustments for 'dev' environment
      $config['bootstrap'][] = 'debug';
      $config['modules']['debug'] = [
      'class' => 'yii\debug\Module',
      ];

      $config['bootstrap'][] = 'gii';
      $config['modules']['gii'] = [
      'class' => 'yii\gii\Module',
      ];
     */
}

return $config;
