<?php namespace backend\assets;
use yii\web\AssetBundle;

class AppMenuAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';
    public $css = [
        'css/bootstrap.css',
    ];

    public $js =[
        'js/bootstrap.js'
    ];
}
