<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        // 全局系统配置
        'config' => [
            'class' => 'common\components\system\Config',
        ],
    ],
];
