<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 17:10
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = '查看权限';
$this->params['breadcrumbs'][] = ['label' => '行业分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-user-view">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= Html::encode($this->title) ?></h5>
            <div class="ibox-tools">
                <?= Html::a('添加权限', ['allocation/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('删除', ['delete', 'id' => $model->user_id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="ibox-content">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'label' => '用户名',
                    'value' => $model->getUserNames($model->user_id),
                ],
                [
                    'label' => '角色类型',
                    'value' => $model->getRoleName($model->role_id),
                ],
            ],
        ]) ?>

        </div>
    </div>
</div>