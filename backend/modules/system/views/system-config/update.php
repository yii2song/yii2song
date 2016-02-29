<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\system\SystemConfig $model
 */

$this->title = 'Update System Config: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'System Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="system-config-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
