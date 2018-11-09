<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
         'view' => [
             'theme' => [
                 'pathMap' => [
                    '@app/views' => '@frontend/themes/material/views'
                 ],
             ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
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
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'assetManager' => [
            'bundles' => [
               'yii\web\JqueryAsset' => false,
               'yii\bootstrap\BootstrapPluginAsset' => false,
               'yii\bootstrap\BootstrapAsset' => false,
            ],
        ],
    ],
    'as access' => [
                'class' => 'mdm\admin\components\AccessControl',
                'allowActions' => [
                   # '/*',
                   # 'gii/*',
                     'site/*',
                    # 'admin/*',
                    # 'user/*',                    
                     'user/security/logout',                    
                    // 'some-controller/some-action',
                ]
            ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
             'layout' => 'left-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
             'mainLayout' => '@app/views/layouts/main.php',
             'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User', 
                    //เรียกใช้โมเดล user ของ dektrium
                ]
            ],
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => [true],
        ],
    ],
    'params' => $params,
];
