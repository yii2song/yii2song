<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use Yii\helpers\ArrayHelper;
use common\models\system\SystemConfig;

/**
 * @var yii\web\View                      $this
 * @var common\models\system\SystemConfig $model
 * @var yii\widgets\ActiveForm            $form
 */
?>

<div class="system-config-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
    <?php
    echo Form::widget([
        'model'      => $model,
        'form'       => $form,
        'columns'    => 1,
        'attributes' => [
            'group'  => [
                'type'  => Form::INPUT_DROPDOWN_LIST,
                'items' => SystemConfig::groups(),
            ],
            'type'   => [
                'type'  => Form::INPUT_DROPDOWN_LIST,
                'items' => SystemConfig::types(),
                'size'  => Form::SIZE_TINY,
            ],
            'name'   => [
                'type'    => Form::INPUT_TEXT,
                'options' => ['placeholder' => '如：ADMIN_ALLOW_IP',
                              'maxlength'   => 30,
                ],
            ],
            'extra'  => [
                'type'    => Form::INPUT_TEXTAREA,
                'options' => [
                    'placeholder' => '如果是枚举型，需要配置该项',
                    'maxlength'   => 255,
                    'rows'        => 6,
                ],
            ],
            'title'  => [
                'type'    => Form::INPUT_TEXT,
                'options' => [
                    'placeholder' => '输入配置标题...',
                    'maxlength'   => 50,
                ],
            ],
            'remark' => [
                'type'    => Form::INPUT_TEXT,
                'options' => [
                    'placeholder' => '输入配置说明...',
                    'maxlength'   => 100,
                ],
            ],
            'sort'   => [
                'type'    => Form::INPUT_TEXT,
                'options' => ['placeholder' => '排序...'],
            ],
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
