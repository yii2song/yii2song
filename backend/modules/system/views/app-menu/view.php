<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\system\AppMenu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'App Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'app_id',
            'parent_id',
            'depth',
            'is_final',
            'icon',
            'module',
            'controller',
            'action',
            'path',
            'url:url',
            'group',
            'sort',
            'hide',
            'status',
        ],
    ]) ?>

</div>
