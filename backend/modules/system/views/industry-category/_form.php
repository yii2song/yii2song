<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View                          $this
 * @var common\models\system\IndustryCategory $model
 * @var yii\widgets\ActiveForm                $form
 */
?>

<div class="industry-category-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([
        'model'      => $model,
        'form'       => $form,
        'columns'    => 1,
        'attributes' => [
            'name' => [
                'type' => Form::INPUT_TEXT,
                'options' => [
                    'placeholder' => '输入行业名称...',
                    'maxlength' => true
                ]
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
