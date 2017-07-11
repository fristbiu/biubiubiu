<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
<<<<<<< HEAD
            'dsn' => 'mysql:host=localhost;dbname=biubiubiu',
            'username' => 'root',
            'password' => 'root',
=======
            'dsn' => 'mysql:host=47.93.54.244;dbname=biubiubiu',
            'username' => 'biubiubiu',
            'password' => 'biubiubiu',
>>>>>>> refs/remotes/origin/master
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
