<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\system\AppMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'app_id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'depth') ?>

    <?php // echo $form->field($model, 'is_final') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'module') ?>

    <?php // echo $form->field($model, 'controller') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'group') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'hide') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
