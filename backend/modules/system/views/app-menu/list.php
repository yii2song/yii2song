<?php

use kartik\helpers\Html;
use kartik\grid\GridView;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $app_id */
/* @var $parent_id */
/* @var $appNav */
/* @var $searchModel common\models\system\AppMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '应用菜单';
$this->params['breadcrumbs'][] = ['label' => '应用菜单', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-menu-list">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    NavBar::begin([]);
    echo NavX::widget([
        'options' => ['class' => 'nav navbar-nav'],
        'items' => $appNav,
        'activateParents' => true,
        'encodeLabels' => false
    ]);
    NavBar::end();
    ?>
    <p>
        <?= Html::a('新增菜单', ['create?app_id=' . $app_id . '&parent_id=' . $parent_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'app_id',
            'parent_id',
            // 'depth',
            // 'is_final',
            // 'icon',
            // 'module',
            // 'controller',
            // 'action',
            // 'path',
            // 'url:url',
            // 'group',
            // 'sort',
            // 'hide',
            // 'status',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

</div>
