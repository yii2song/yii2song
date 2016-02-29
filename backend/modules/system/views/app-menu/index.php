<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\sortable\Sortable;
use backend\modules\system\assets\AppMenuAsset;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\system\models\search\AppMenuSearch $searchModel
 * @var array $parentTree
 * @var array $menuData
 * @var backend\modules\system\models\AppMenuForm $model
 * @var common\models\system\App $app
 */
AppMenuAsset::register($this);

$this->title = '应用菜单';

$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url' => Yii::$app->urlManager->createUrl(['system/app-menu']),
];

$this->params['breadcrumbs'][] = [
    'label' => $app->name,
    'url' => Yii::$app->urlManager->createUrl(['system/app-menu', 'app_id' => $app->id]),
];

foreach($parentTree as $val) {
    $this->params['breadcrumbs'][] = [
        'label' => $val['name'],
        'url' => Yii::$app->urlManager->createUrl(['system/app-menu', 'app_id' => $app->id, 'parent_id' => $val['id']]),
    ];
}

$appList = \common\models\system\App::find()->active()->all();
$appListHtml = '';
foreach($appList as $appItem) {
    $appListHtml .= '<li><a href="' .
        Yii::$app->urlManager->createUrl(['system/app-menu', 'app_id' => $appItem->id]) .
        '">' . $appItem->name . '</a></li>';
}

$this->params['topButtons'][] = '<div class="btn-group">' .
    '<button type="button" class="btn btn-primary dropdown-toggle" ' .
    'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-bars"></span> ' .
    $app->name . ' <span class="caret"></span>' .
    '</button><ul class="dropdown-menu">' . $appListHtml . '</ul></div>';
?>
<div class="app-menu-index">
    <div class="app-menu-form" id="J_appMenuForm">
        <div class="row">
            <div class="col-md-6">
                <div class="tree-box">
                    <div class="panel panel-default">
                        <div class="panel-heading">第一列</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default" id="J_appMenuList1Panel">
                                        <div class="panel-heading">一级</div>
                                        <div class="panel-body menu-list-body" id="J_appMenuList1" data-app_id="<?=$app->id?>" data-column="1" data-parent_id="0">
                                            <div class="no-data">暂无数据</div>
                                        </div>
                                        <div class="panel-footer action-footer">
                                            <button class="btn btn-success btn-sm action-new" data-cid="1" data-column="1"><span class="fa fa-plus"></span> 新增</button>
                                            <button class="btn btn-success btn-sm action-sort" data-cid="1" data-column="1"><span class="fa fa-sort-alpha-asc"></span> 排序</button>
                                            <button class="btn btn-success btn-sm action-edit" data-cid="1" data-column="1"><span class="fa fa-pencil"></span> 编辑</button>
                                            <button class="btn btn-success btn-sm action-icon" data-cid="1" data-column="1"><span class="fa fa-file-image-o"></span> 图标</button>
                                            <button class="btn btn-danger btn-sm action-del" data-cid="1" data-column="1"><span class="fa fa-close"></span> 删除</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default" id="J_appMenuList2Panel">
                                        <div class="panel-heading">二级</div>
                                        <div class="panel-body menu-list-body" id="J_appMenuList2" data-app_id="<?=$app->id?>" data-column="1" data-parent_id="0">
                                            <div class="no-data">暂无数据</div>
                                        </div>
                                        <div class="panel-footer action-footer">
                                            <button class="btn btn-success btn-sm action-new" data-cid="2" data-column="1"><span class="fa fa-plus"></span> 新增</button>
                                            <button class="btn btn-success btn-sm action-sort" data-cid="2" data-column="1"><span class="fa fa-sort-alpha-asc"></span> 排序</button>
                                            <button class="btn btn-success btn-sm action-edit" data-cid="2" data-column="1"><span class="fa fa-pencil"></span> 编辑</button>
                                            <button class="btn btn-success btn-sm action-icon" data-cid="2" data-column="1"><span class="fa fa-file-image-o"></span> 图标</button>
                                            <button class="btn btn-danger btn-sm action-del" data-cid="2" data-column="1"><span class="fa fa-close"></span> 删除</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tree-box">
                    <div class="panel panel-default">
                        <div class="panel-heading">第二列</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default" id="J_appMenuList3Panel">
                                        <div class="panel-heading">三级</div>
                                        <div class="panel-body menu-list-body" id="J_appMenuList3" data-app_id="<?=$app->id?>" data-column="2" data-parent_id="0">
                                            <div class="no-data">暂无数据</div>
                                        </div>
                                        <div class="panel-footer action-footer">
                                            <button class="btn btn-success btn-sm action-new" data-cid="3" data-column="2"><span class="fa fa-plus"></span> 新增</button>
                                            <button class="btn btn-success btn-sm action-sort" data-cid="3" data-column="2"><span class="fa fa-sort-alpha-asc"></span> 排序</button>
                                            <button class="btn btn-success btn-sm action-edit" data-cid="3" data-column="2"><span class="fa fa-pencil"></span> 编辑</button>
                                            <button class="btn btn-success btn-sm action-icon" data-cid="3" data-column="2"><span class="fa fa-file-image-o"></span> 图标</button>
                                            <button class="btn btn-danger btn-sm action-del" data-cid="3" data-column="2"><span class="fa fa-close"></span> 删除</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default" id="J_appMenuList4Panel">
                                        <div class="panel-heading">四级</div>
                                        <div class="panel-body menu-list-body" id="J_appMenuList4" data-app_id="<?=$app->id?>" data-column="2" data-parent_id="0">
                                            <div class="no-data">暂无数据</div>
                                        </div>
                                        <div class="panel-footer action-footer">
                                            <button class="btn btn-success btn-sm action-new" data-cid="4" data-column="2"><span class="fa fa-plus"></span> 新增</button>
                                            <button class="btn btn-success btn-sm action-sort" data-cid="4" data-column="2"><span class="fa fa-sort-alpha-asc"></span> 排序</button>
                                            <button class="btn btn-success btn-sm action-edit" data-cid="4" data-column="2"><span class="fa fa-pencil"></span> 编辑</button>
                                            <button class="btn btn-success btn-sm action-icon" data-cid="4" data-column="2"><span class="fa fa-file-image-o"></span> 图标</button>
                                            <button class="btn btn-danger btn-sm action-del" data-cid="4" data-column="2"><span class="fa fa-close"></span> 删除</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="J_appMenuModal" tabindex="-1" role="dialog" aria-labelledby="J_appMenuModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php $form = ActiveForm::begin([
                'type' => ActiveForm::TYPE_VERTICAL,
                'action' => ['app-menu/save'],
                'id' => 'J_appMenuModalForm'
            ]); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="J_appMenuModalLabel">菜单表单</h4>
            </div>
            <div class="modal-body">
                <?php
                echo Form::widget([
                    'model' => $model,
                    'form' => $form,
                    'columns' => 2,
                    'attributes' => [
                        'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '菜单名称，如：用户管理', 'maxlength' => 100]],
                        'url' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '访问链接，如：customer/company/create', 'maxlength' => 100]],
                        'description' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '菜单描述', 'maxlength' => 255]],
                        'param' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => '参数，一条一行，如：id=1', 'maxlength' => 255]],
                        'module' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '模块，如：customer', 'maxlength' => 30]],
                        'controller' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '控制器，如：company', 'maxlength' => 30]],
                        'action' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '动作，如：create', 'maxlength' => 30]],
                        'node' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '节点名称，如：customer.company.create', 'maxlength' => 100]],
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
                        'is_show' => [
                            'type' => Form::INPUT_DROPDOWN_LIST,
                            'items' => [
                                '1' => '显示',
                                '0' => '隐藏',
                            ],
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
            <div class="modal-footer">
                <input type="hidden" name="<?=$model->formName() ?>[id]" id="J_appMenuFormId" value="">
                <input type="hidden" name="<?=$model->formName() ?>[app_id]" value="<?=$app->id ?>">
                <input type="hidden" name="<?=$model->formName() ?>[parent_id]" id="J_appMenuFormParentId" value="">
                <input type="hidden" name="<?=$model->formName() ?>[column]" id="J_appMenuFormColumn" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="J_appMenuIconModal" tabindex="-1" role="dialog" aria-labelledby="J_appMenuIconModalLabel" data-menu-id="">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="J_appMenuIconModalLabel">菜单图标选择器</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->render('_icon'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">确定</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="J_appMenuConfirmModal" tabindex="-1" role="dialog" aria-labelledby="J_appMenuConfirmModalLabel" data-menu-id="" data-cid="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="J_appMenuConfirmModalLabel">操作确认</h4>
            </div>
            <div class="modal-body">
                确认要做些操作？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">确定</button>
            </div>
        </div>
    </div>
</div>
