<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\helpers\ArrayHelper;
use backend\modules\system\models\UserMessageContent;

?>

<?= Html::cssFile('@web/css/plugins/select2/select2.min.css') ?>
<script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/js/plugins/select2/select2.full.min.js"></script>

<div class="industry-category-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'type' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '请选择'],
                'items' => [
                    '1' => '平台消息',
                    '0' => '系统消息',
                ],
            ],
            'target' => [
                'type' => Form::INPUT_RADIO_LIST,
                'items' => [
                    UserMessageContent::MESSAGE_TYPE_ALL => $model->messageTypes[UserMessageContent::MESSAGE_TYPE_ALL],
                    UserMessageContent::MESSAGE_TYPE_FOUNDER => $model->messageTypes[UserMessageContent::MESSAGE_TYPE_FOUNDER],
                    UserMessageContent::MESSAGE_TYPE_COMPANY => $model->messageTypes[UserMessageContent::MESSAGE_TYPE_COMPANY],
                    UserMessageContent::MESSAGE_TYPE_PACKAGE => $model->messageTypes[UserMessageContent::MESSAGE_TYPE_PACKAGE],
                ]
            ],
            'title' => [
                'type' => Form::INPUT_TEXT,
            ],
            'content' => [
                'type' => Form::INPUT_TEXTAREA,
            ],
        ],
    ]);
    ?>

    <div class="form-group  required" id="department_ids">
        <label class="control-label col-md-2">选择公司</label>

        <div class="col-md-10 simulate-sel" style="width: 1318px;">
            <select class="form-control select2" multiple="multiple" data-placeholder="请选择公司" name="target_data[]">
                <?php foreach ($package as $e) { ?>
                    <option value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-10"></div>
        <div class="col-md-offset-2 col-md-10">
            <div class="help-block"></div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton(Yii::t('common', '发送'),
                ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<script>
    $(".select2").select2();
</script>