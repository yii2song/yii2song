<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use common\models\system\UserTerm;
use yii\redactor\widgets\Redactor;

/**
 * @var yii\web\View                  $this
 * @var common\models\system\UserTerm $model
 * @var yii\widgets\ActiveForm        $form
 */
?>

<div class="user-term-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([

        'model'      => $model,
        'form'       => $form,
        'columns'    => 1,
        'attributes' => [
            'code' => [
                'type'  => Form::INPUT_DROPDOWN_LIST,
                'items' => UserTerm::codes(),
            ],
            'title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '输入标题，和类型保持一致', 'maxlength' => 255]],
            'content' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '输入内容', 'rows' => 6]],
            'version' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：1.01', 'maxlength' => 10]],
        ],
    ]);

    echo $form->field($model, 'content')->widget(Redactor::className(), [
        'clientOptions' => [
            'lang' => 'zh_cn',
            'plugins' => ['clips', 'fontcolor','imagemanager']
        ]
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
