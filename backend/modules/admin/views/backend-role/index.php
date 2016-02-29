<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 17:25
 */
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\admin\models\BackendRole;


$this->title = '角色列表';
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['index']];
?>
<div class="backend-role-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!--
    <p>
        <?= Html::a('添加角色', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            [
                'label' => '权限集',
                'value' => function($model){
                    return BackendRole::getAuthoritySet($model->data);
                },
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status==1) return "启用" ;
                    if($model->status==0) return "禁用" ;
                },
            ],
            [
                'label' => '创建时间',
                'format' => ['date', 'php:Y-m-d'],
                'value' => 'created_at',
            ],
            [
                'label' => '更新时间',
                'format' => ['date', 'php:Y-m-d'],
                'value' => 'updated_at',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],

        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,

        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type'=>'info',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> 添加角色', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> 刷新列表', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
    ]); Pjax::end(); ?>

</div>