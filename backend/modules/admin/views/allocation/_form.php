<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 15:45
 */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use Yii\helpers\ArrayHelper;
use backend\modules\admin\models\BackendRole;

?>
<div class="industry-category-form">
    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>
    <?php


    echo Form::widget([
        'model'      => $model,
        'form'       => $form,
        'columns'    => 1,
        'attributes' => [
            'id'        => ['type' => Form::INPUT_HIDDEN],
            'username'  => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '如：1', 'maxlength' => true]],
            'role'      => [
                'label'   => '角色类型',
                'type'    => Form::INPUT_DROPDOWN_LIST,
                'items'   => ['角色类型'=>ArrayHelper::map(BackendRole::findAll(['status' => 1]),'id','name')],
                'prompt'  => '请选择角色'
            ],

        ],
    ]);
    ?>

    <div class="form-group">
        <div class="">
            <?= Html::submitButton('保存',
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>