<?php
/**
 * Created by PhpStorm.
 * User: song
 * Date: 2016/2/1
 * Time: 17:09
 */
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\system\models\SystemConfig */

$this->title = '创建系统配置项';
$this->params['breadcrumbs'][] = ['label' => '系统配置', 'url' => ['manage']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>