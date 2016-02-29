<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use Yii\helpers\ArrayHelper;
use common\models\system\App;

/* @var $this yii\web\View */
/* @var $model common\models\system\App */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="app-form">
    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
    <?php
    echo Form::widget([
        'model'      => $model,
        'form'       => $form,
        'columns'    => 1,
        'attributes' => [
            'name'        => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '输入应用名称...', 'maxlength' => true]],
            'code'        => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '输入应用代号...', 'maxlength' => true]],
             'icon'   => [
                'type'        => Form::INPUT_WIDGET,
                'widgetClass' => '\common\components\iconinput\IconInput',
                'options'     => ['data' => ArrayHelper::map(App::find()->orderBy('name')->asArray()->all(), 'id', 'name')],
                'hint'        => '选择或者输入一个图标样式',
            ],
            'url'         => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：@app_url/product/category/create', 'maxlength' => true]],
            'secret_key'      => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：product', 'maxlength' => true]],
            'public_key'  => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：category', 'maxlength' => true]],
            'status'      => [
                'type'    => Form::INPUT_RADIO_LIST,
                'items'   => [1 => '启用', 0 => '禁用'],
                'options' => ['inline' => true],
                'defaultValue' => 1,
            ],
            'sort'        => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '输入排序,如100...', 'maxlength' => true]],
            'description' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '输入应用描述...', 'maxlength' => true]],
        ],
    ]);
    ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
