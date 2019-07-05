<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'languages' => [
            'class' => 'klisl\languages\Module',
            //Языки используемые в приложении
            'languages' => [
                'РУС' => 'ru',
                'УКР' => 'uk',
            ],
            'default_language' => 'ru', //основной язык (по-умолчанию)
            'show_default' => false, //true - показывать в URL основной язык, false - нет
        ],
    ],
    'bootstrap' => ['log', 'languages'],
    'components' => [
        'request' => [
            'class' => 'klisl\languages\Request',
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'post/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'class' => 'klisl\languages\UrlManager',
            'rules' => [
                'languages' => 'languages/default/index', //для модуля мультиязычности

                '/' => 'post/index', //главная страница

                '/contact-form/call-back' => '/contact-form/call-back',

                //вывод городов
                [
                    'pattern'=>'city/<url:.+>',
                    'route' => 'post/city',
                ],
                //вывод отдельной страницы
                [
                    'pattern'=>'<url:.+>',
                    'route' => 'post/view',
                ],

            ],
        ],

    ],
    'params' => $params,
];
