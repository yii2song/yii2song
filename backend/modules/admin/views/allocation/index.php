<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 14:38
 */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;



$this->title = '角色分配';
$this->params['breadcrumbs'][] = ['label' => '分配列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="company-scale-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => $usernameField,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}'
            ],
        ],

        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,

        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type'=>'info',
            'before'=>'',
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> 刷新列表', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
    ]); Pjax::end(); ?>

</div>