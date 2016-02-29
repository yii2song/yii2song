<?php
/**
 * Created by PhpStorm.
 * User: song
 * Date: 2016/2/1
 * Time: 17:01
 */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\system\models\search\SystemConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统配置项管理';
$this->params['breadcrumbs'][] = ['label' => '系统配置', 'url' => ['manage']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['topButtons'][] = Html::a('创建新配置项', ['create'], ['class' => 'btn btn-primary']);
?>
<div class="system-config-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'title',
            'group',
            // 'extra',
            // 'value:ntext',
            // 'remark',
            'status',
            // 'sort',
            'created_at:date',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>