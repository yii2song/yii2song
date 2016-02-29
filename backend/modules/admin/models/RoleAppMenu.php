<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/30
 * Time: 10:24
 */

namespace backend\modules\admin\models;

use common\models\system\AppMenu;
use kartik\tree\models\TreeTrait;

class RoleAppMenu extends AppMenu
{
    public $lvl;
    public $lft;
    public $rgt;
    public $icon_type;

    use TreeTrait{
        isDisabled as parentIsDisabled;
    }

    public static $treeQueryClass;// change if you need to set your own TreeQuery

    /**
     * @var bool whether to HTML encode the tree node names. Defaults to `true`.
     */
    public $encodeNodeNames = true;

    /**
     * @var bool whether to HTML purify the tree node icon content before saving.
     * Defaults to `true`.
     */
    public $purifyNodeIcons = true;

    /**
     * @var array activation errors for the node
     */
    public $nodeActivationErrors = [];

    /**
     * @var array node removal errors
     */
    public $nodeRemovalErrors = [];

    /**
     * @var bool attribute to cache the `active` state before a model update. Defaults to `true`.
     */
    public $activeOrig = true;

    /**
     * Note overriding isDisabled method is slightly different when
     * using the trait. It uses the alias.
     */
    public function isDisabled()
    {
//        if (\Yii::$app->user->username !== 'admin') {
//            return true;
//        }
        if(\Yii::$app->user->identity->username !='admin')
        return $this->parentIsDisabled();
    }

    public static function tableName()
    {
        return '{{%app_menu}}';
    }
}