<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use Yii\helpers\ArrayHelper;
use common\models\system\App;

/* @var $this yii\web\View */
/* @var $model common\models\system\AppMenu */
/* @var $form */
?>

<div class="app-menu-form">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'app_name' => ['type' => Form::INPUT_STATIC,],
            'parent_name' => ['type' => Form::INPUT_STATIC,],
            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '输入菜单名称...', 'maxlength' => 36]],
            'icon' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => '\common\components\iconinput\IconInput',
                'options' => ['data' => ArrayHelper::map(App::find()->orderBy('name')->asArray()->all(), 'id', 'name')],
            ],
            'module' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：product', 'maxlength' => 36]],
            'controller' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：category', 'maxlength' => 36]],
            'action' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：create', 'maxlength' => 36]],
            'path' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：product/category/create', 'maxlength' => 36]],
            'url' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：@app_url/product/category/create', 'maxlength' => 36]],
            'status' => [
                'type' => Form::INPUT_RADIO_LIST,
                'items' => [1 => '启用', 0 => '禁用'],
                'options' => ['inline' => true],
            ],
            'description' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '输入菜单描述...']],
        ],
    ]);
    ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
