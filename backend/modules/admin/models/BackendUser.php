<?php

namespace backend\modules\admin\models;

use common\models\user\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%backend_user}}".
 *
 * @property integer $user_id
 * @property integer $role_id
 */
class BackendUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%backend_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'role_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户 ID',
            'role_id' => '角色 ID',
        ];
    }

    /**
     * 获得用户名
     * @param $id
     * @return string
     */
    public static function getUserNames($id)
    {
        if(!$id)
            return '未设置';
        $info = User::find()->all();
        $data = ArrayHelper::map($info, 'id', 'username');

        if(isset($data[$id]))
            return  $data[$id];
        else
            return '用户不存在';

    }

    /**
     * 获得角色名
     * @param $id
     * @return string
     */
    public static function getRoleName($id)
    {
        if(!$id)
            return '未设置';
        $info = BackendRole::find()->all();

        $data = ArrayHelper::map($info, 'id', 'name');

        if(isset($data[$id]))
            return  $data[$id];
        return '未设置';
    }
}
