<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\system\UserTerm $model
 */

$this->title = 'Update User Term: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Terms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-term-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
