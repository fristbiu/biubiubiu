<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
<<<<<<< HEAD
            'cookieValidationKey' => 'BA3FKeVGyYVRHlnaox4upuFH8ZpgsbyG',
=======
            'cookieValidationKey' => 'TzfL9LELbsddUR1x0b91HcFdsxrHuLJF',
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
