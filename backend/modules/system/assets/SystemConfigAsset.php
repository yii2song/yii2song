<?php namespace backend\modules\system\assets;

use yii\web\AssetBundle;

class SystemConfigAsset extends AssetBundle
{
    public $sourcePath = '@backend/modules/system/assets/src';
    public $css = [
    ];

    public $js =[
        'js/system-config.js',
    ];

    public $publishOptions = [
        'only' => [
            'js/*',
            'css/*',
        ]
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
