<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
<<<<<<< HEAD
            'cookieValidationKey' => 'dGKLRDFF24aO4h9mM_nAmjOJe7syzx7v',
=======
            'cookieValidationKey' => '8fhTXwR-XQZGGS2M_WaAJB6JoLQW1N9p',
>>>>>>> refs/remotes/origin/master
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
