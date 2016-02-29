<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 16:55
 */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use backend\modules\admin\models\BackendUser;



$this->title = '权限列表';
$this->params['breadcrumbs'][] = ['label' => '权限列表', 'url' => ['index']];
?>

<div class="backend-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'user_id',
            [
                'label' => '用户名',
                'value' => function($model){
                    return BackendUser::getUserNames($model->user_id);
                },
            ],
//            'role_id',
            [
                'label' => '角色类型',
                'value' => function($model){
                    return BackendUser::getRoleName($model->role_id);
                },
            ],

//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl([
                                'admin/allocation/view',
                                'id' => $model->user_id,'edit'=>'t'
                            ]),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }

                ],
            ],
        ],

        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,

        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type'=>'info',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> 分配权限', ['allocation/index'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> 刷新列表', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
    ]); Pjax::end(); ?>

</div>