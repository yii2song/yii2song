<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '消息管理', 'url' => ['index']];
?>
<div class="company-scale-view">

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>$this->title,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'id',
            'title',
            'content',
            [
                'label' => '操作人',
                'value'=>$model->userInfo->username,
            ],
            [
                'label' => '消息对象',
                'value' => $model->getMessageTarget($model->target),
            ],
            [
                'label' => '消息对象数据',
                'value' => $model->getMessageTargetData($model->target_data,$model->target),
            ],
            [
                'attribute'=>'type',
                'value'=>$model->type == 1?'平台消息':'系统消息',
            ],

            'is_top',
            'priority',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d'],
                'value'=>$model->created_at,
            ],
        ],

        'enableEditMode'=>false,
    ]) ?>

</div>