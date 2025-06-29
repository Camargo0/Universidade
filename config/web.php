<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insira uma chave secreta aqui para validação de cookies
            'cookieValidationKey' => '9O91J6rZFQpIZK03sx3Db3pTlw44vdyG',
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // envia todos os emails para arquivo por padrão
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
        'db' => $db,

        // Configuração URL amigável
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'curso/index',  // página inicial vai para lista de cursos
            ],
        ],
    ],
    'params' => $params,
];

// Configurações específicas para ambiente de desenvolvimento
if (YII_ENV_DEV) {
    // Adiciona debug e gii ao bootstrap apenas em desenvolvimento
    $config['bootstrap'][] = 'debug';
    $config['bootstrap'][] = 'gii';
    
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // 'allowedIPs' => ['127.0.0.1', '::1'], // descomente para limitar acesso ao debug
    ];

    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // 'allowedIPs' => ['127.0.0.1', '::1'], // descomente para limitar acesso ao gii
    ];
}

return $config;
