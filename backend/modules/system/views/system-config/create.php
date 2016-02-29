<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\system\SystemConfig $model
 */

$this->title = '创建系统配置项';
$this->params['breadcrumbs'][] = ['label' => '系统配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-config-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
