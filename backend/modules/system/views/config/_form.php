<?php
/**
 * Created by PhpStorm.
 * User: song
 * Date: 2016/2/1
 * Time: 17:08
 */
use yii\helpers\Html;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use backend\modules\system\models\SystemConfig;

/* @var $this yii\web\View */
/* @var $model backend\modules\system\models\SystemConfig */
/* @var $form yii\widgets\ActiveForm */
?>
<?php echo \backend\widgets\Alert::widget() ?>
<div class="ibox">
<div class="ibox-title"><h5><?=$this->title?></h5></div>
<div class="ibox-content system-config-form">
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        //'enableAjaxValidation' => true,
        'fieldConfig' => [
            //'autoPlaceholder'=>true
        ]
    ]);
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'name' => [
                'type' => Form::INPUT_TEXT,
                'options' => [
                    'placeholder' => '只能是大写英文字母，中间可以使用下划线',
                    'maxlength' => true
                ]
            ],
            'title' => [
                'type' => Form::INPUT_TEXT,
                'options' => [
                    'placeholder' => '配置标题',
                    'maxlength' => true
                ]
            ],
            'remark' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => [
                    'placeholder' => '配置说明',
                    'maxlength' => true,
                ],
            ],
            'group' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => SystemConfig::groups(),
            ],
            'type' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => SystemConfig::types(),
            ],
            'extra' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => [
                    'placeholder' => '配置扩展值',
                    'rows' => 6,'columnSize' => Form::SIZE_TINY,
                    'maxlength' => true
                ]
            ],
            'sort' => [
                'type' => Form::INPUT_TEXT,
            ],
            'status' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => SystemConfig::status(),
            ],
        ],
    ]);
    ?>
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
</div>