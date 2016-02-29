<?php

namespace backend\modules\admin\models;

use backend\modules\system\models\AppMenu;
use Yii;
use yii\db\Query;

/**
 * This is the model class for table "{{%backend_role}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $data
 * @property integer $status
 * @property integer $is_default
 * @property integer $created_at
 * @property integer $updated_at
 */
class BackendRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%backend_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'data'], 'required'],
            [['data'], 'string'],
            [['status', 'is_default', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '角色名称',
            'data' => '权限id集',
            'status' => '状态',
            'is_default' => '用户默认添加此角色',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getBackendUser()
    {
        return $this->hasMany(BackendUser::className(), ['role_id'=>'id']);
    }

    /**
     * 获得权限集合
     * @param $set
     * @return string
     */
    public static function getAuthoritySet($set)
    {
        if($set){
            $set_arr = explode(',',$set);
            $set_list = AppMenu::findAll($set_arr);
            $temp = array();
            foreach($set_list as $vo){
                $temp[] = $vo['name'];
            }

            return implode(',',$temp);
        }else{
            return '未设置';
        }
    }

    public static function getRouteByUserRole($user_id)
    {
        $query = new Query;
        $query  ->select('*')
            ->from('{{%backend_role}}')
            ->leftJoin('{{%backend_user}}', '{{%backend_user}}.role_id = {{%backend_role}}.id')->where(['{{%backend_role}}.status'=>1,'{{%backend_user}}.user_id'=>$user_id]);
        $command = $query->createCommand();
        $data = $command->queryOne();


        $set_arr = explode(',',$data['data']);
        $set_list = AppMenu::findAll($set_arr);
        $temp = array();
        foreach($set_list as $vo){
            $temp[] = $vo['url'];
        }

        return $temp;
    }

}
