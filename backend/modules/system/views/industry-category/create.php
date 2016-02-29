<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\system\IndustryCategory $model
 */

$this->title = '创建行业分类';
$this->params['breadcrumbs'][] = ['label' => '行业分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-category-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
