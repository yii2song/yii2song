<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\system\App */

$this->title = '创建应用';
$this->params['breadcrumbs'][] = ['label' => '应用', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
