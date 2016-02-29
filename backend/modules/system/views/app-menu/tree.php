<?php
/**
 * Created by PhpStorm.
 * User: AndySong
 * Date: 2015-11-30
 * Time: 11:17
 */

use kartik\nav\NavX;
use yii\bootstrap\NavBar;
/**
 * @var $appNav
 * @var $app \common\models\system\App;
 */

$this->title = '应用菜单';
$this->params['breadcrumbs'][] = $this->title;

NavBar::begin([]);
echo NavX::widget([
    'options' => ['class' => 'nav navbar-nav'],
    'items' => $appNav,
    'activateParents' => true,
    'encodeLabels' => false
]);
NavBar::end();


echo \kartik\tree\TreeView::widget([
    'query' => \backend\modules\system\models\AppMenu::find()->andWhere(['app_id' => $app->id])->addOrderBy('root, lft'),
    'headingOptions' => ['label' => '应用菜单'],
    'rootOptions' => ['label' => '<span class="text-primary">' . $app->name . '</span>'],
    'fontAwesome' => true,
    'isAdmin' => true,
    'displayValue' => 0,

    /**
     * boolean, whether the ID key attribute is to be displayed in the node details form.
     * Defaults to true. If set to false the key attribute will be rendered as a hidden input.
     */
    'showIDAttribute' => false,

    'iconEditSettings' => [
        'show' => 'text',
        'listData' => [
            'folder' => 'Folder',
            'file' => 'File',
            'mobile' => 'Phone',
            'bell' => 'Bell',
        ]
    ],
    'softDelete' => true,
    'cacheSettings' => ['enableCache' => true],
    'nodeAddlViews' => [
        \kartik\tree\Module::VIEW_PART_2 => '@backend/modules/system/views/app-menu/_treePart2',
    ],
]);