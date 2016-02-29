<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\system\UserTerm $model
 */

$this->title = '创建用户协议';
$this->params['breadcrumbs'][] = ['label' => '用户协议', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-term-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
