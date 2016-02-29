<?php

use yii\helpers\Html;
use common\models\system\App;
use Yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use backend\modules\system\assets\AppMenuAsset;

/**
 * @var yii\web\View $this
 * @var common\models\system\AppMenu $model
 * @var array $menuTree
 * @var string $app_id
 * @var string $parent_id
 */

$this->title = '新增菜单';
$this->params['breadcrumbs'][] = ['label' => '应用菜单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AppMenuAsset::register($this);
?>
<div class="app-menu-create">
    <div class="app-menu-form">
        <div class="row">
            <div class="col-md-4">
                <div class="tree-box">d</div>
            </div>
            <div class="col-md-4">
                <div class="tree-box">s</div>
            </div>
            <div class="col-md-4">
                <div class="tree-box"></div>
            </div>
        </div>
    </div>
    <div class="app-menu-form">
        <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?=$this->title?></h5>
            </div>
            <div class="ibox-content">
                <?php
                echo Form::widget([
                    'model' => $model,
                    'form' => $form,
                    'columns' => 1,
                    'attributes' => [
                        'app_id' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => ArrayHelper::map(App::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                        ],
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
                        'is_show' => [
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
                    ]


                ]);
                ?>
            </div>
            <div class="ibox-footer">
                <div class="col-md-offset-2">
                    <?= Html::submitButton('<i class="fa fa-check"></i> 提交保存', ['class' => 'btn btn-primary']); ?>
                    <?= Html::a('<i class="fa fa-mail-reply"></i> 取消', ['index', 'app_id' => $app_id], ['class' => 'btn btn-default']); ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php

$this->registerJs('$(function () {$(\'#app-menu-form-app_id\').on(\'change\', function (e) {' .
    'window.location.href = \'?app_id=\' + $(this).val() + \'&parent_id=' . $parent_id . '\';});});');
?>