<?php return array(
        'name' => 'dweling',
        'components' => array(
            'db' => array(
                'class' => 'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=dweling_comment',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'schemaCachingDuration' => '3600',
                'enableProfiling' => true,
            ),
            'cache' => array(
                'class' => 'CFileCache',
            ),
        ),
        'params' => array(
            'yiiPath' => 'C:/xampp/htdocs/dweling/framework/',
            'encryptionKey' => 'e6ef6a7f3f4c71daf887ba7a7bd55001385014cec157e908f8bf193aad8043ac0bfebe1a020e5ab6b11f07474d65b844aff8bca8315580609800bc2d',
        )
    );