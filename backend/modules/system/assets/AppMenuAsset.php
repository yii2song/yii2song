<?php namespace backend\modules\system\assets;

use yii\web\AssetBundle;

class AppMenuAsset extends AssetBundle
{
    public $sourcePath = '@backend/modules/system/assets/src';
    public $css = [
        'css/app-menu.css',
    ];

    public $js =[
        'js/app-menu.js',
        'js/html.sortable.js'
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
