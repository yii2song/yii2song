<?php

use yii\helpers\Html;
use common\models\system\App;
use Yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/**
 * @var yii\web\View $this
 * @var common\models\system\AppMenu $model
 * @var array $menuTree
 * @var string $app_id
 * @var string $parent_id
 */

$this->title = '更新：'. $model->name;
$this->params['breadcrumbs'][] = ['label' => '应用菜单', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="app-menu-update">
    <div class="app-menu-form">
        <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">更新菜单</div>
            </div>
            <div class="panel-body">
                <?php
                echo Form::widget([
                    'model' => $model,
                    'form' => $form,
                    'columns' => 1,
                    'attributes' => [
                        'parent_id' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ArrayHelper::map($menuTree, 'id', 'name'),
                        ],
                        'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '菜单名称，如：用户管理', 'maxlength' => 100]],
                        'node' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '节点名称，如：customer.company.create', 'maxlength' => 100]],
                        'module' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '模块，如：customer', 'maxlength' => 30]],
                        'controller' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '控制器，如：company', 'maxlength' => 30]],
                        'action' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '动作，如：create', 'maxlength' => 30]],
                        'url' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '访问链接，如：customer/company/create', 'maxlength' => 100]],
                        'method' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => [
                                'GET' => 'GET（列表，查看）',
                                'POST' => 'POST（新增，修改，删除）',
                            ],
                        ],
                        'is_button' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => \backend\modules\system\models\AppMenu::$buttonPositions,
                        ],
                        'param' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '参数，一条一行，如：id=1', 'maxlength' => 255]],
                        'description' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '菜单描述', 'maxlength' => 255]],
                        'icon' => [
                            'type' => Form::INPUT_WIDGET,
                            'widgetClass' => '\common\components\iconinput\IconInput',
                        ],
                        'status' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => [
                                '1' => '启用',
                                '0' => '禁用',
                            ],
                        ],

                        'is_show' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => [
                                '1' => '显示',
                                '0' => '隐藏',
                            ],
                        ],

                    ]
                ]);
                ?>
            </div>
            <div class="panel-footer">
                <?= Html::submitButton($model->isNewRecord ? '提交创建' : '提交保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php

$this->registerJs('$(function () {$(\'#app-menu-form-app_id\').on(\'change\', function (e) {' .
    'window.location.href = \'?app_id=\' + $(this).val() + \'&parent_id=' . $parent_id . '\';});});');
?>