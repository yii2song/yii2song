<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use backend\modules\system\models\UserMessageContent;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\customer\models\search\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/**
 * @var $packageInfo \common\models\company\AppPackage
 */

$this->title = '系统管理';
$this->params['breadcrumbs'][] = [
    'label' => '消息管理',
    'url' => ['/index'],
];



?>
<div class="company-index">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>消息列表</h5>
        </div>
        <div class="ibox-content">
            <?php Pjax::begin();
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'title',
                    [
                        'label' => '操作人',
                        'format' => 'html',
                        'value' => function ($data) {
                            $userInfo = $data->userInfo;
                            if (empty($userInfo)) {
                                return '-';
                            }
                            return $userInfo->username;

                        },
                    ],
                    [
                        'attribute' => 'target',
                        'format' => 'html',
                        'value' => function ($data) {

                            switch ($data->target) {

                                case UserMessageContent::MESSAGE_TYPE_SYSTEM;
                                    $result = $data->messageTypes[UserMessageContent::MESSAGE_TYPE_SYSTEM];
                                    break;
                                case UserMessageContent::MESSAGE_TYPE_ALL;
                                    $result = $data->messageTypes[UserMessageContent::MESSAGE_TYPE_ALL];
                                    break;
                                case UserMessageContent::MESSAGE_TYPE_USER;
                                    $result = $data->messageTypes[UserMessageContent::MESSAGE_TYPE_USER];
                                    break;
                                case UserMessageContent::MESSAGE_TYPE_FOUNDER;
                                    $result = $data->messageTypes[UserMessageContent::MESSAGE_TYPE_FOUNDER];
                                    break;
                                case UserMessageContent::MESSAGE_TYPE_COMPANY;
                                    $result = $data->messageTypes[UserMessageContent::MESSAGE_TYPE_COMPANY];
                                    break;
                                case UserMessageContent::MESSAGE_TYPE_PACKAGE;
                                    $result = $data->messageTypes[UserMessageContent::MESSAGE_TYPE_PACKAGE];
                                    break;

                            }
                         return $result;
                        },
                    ],
                    [
                        'attribute' => 'type',
                        'format' => 'html',
                        'value' => function ($data) {
                            return $data->type == 1 ? '<span class="label label-success">平台消息</span>'
                                : '<span class="label label-default">系统消息</span>';
                        },
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}'
                    ],
                ],
                'responsive' => true,
                'hover' => true,
                'condensed' => true,
                'floatHeader' => true,

                'panel' => [
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
                    'type' => 'info',
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> 发送消息', ['create'], ['class' => 'btn btn-success']),
                    'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> 刷新列表', ['index'], ['class' => 'btn btn-info']),
                    'showFooter' => false
                ],
            ]);
            Pjax::end(); ?>
        </div>
    </div>


</div>
