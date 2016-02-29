<?php

namespace common\models\system;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\models\system\query\SystemConfigQuery;

/**
 * This is the model class for table "{{%system_config}}".
 *
 * @property string  $id
 * @property string  $name
 * @property integer $type
 * @property string  $title
 * @property integer $group
 * @property string  $extra
 * @property string  $value
 * @property string  $remark
 * @property integer $status
 * @property integer $sort
 * @property string  $created_at
 * @property string  $updated_at
 */
class SystemConfig extends ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    const FIRST_GROUP_INDEX = 1;

    const CONFIG_TYPE_NUMBER = 1; // 数字
    const CONFIG_TYPE_STRING = 2; // 字符
    const CONFIG_TYPE_TEXT = 3;   // 文本
    const CONFIG_TYPE_ARRAY = 4;  // 数组
    const CONFIG_TYPE_ENUM = 5;   // 枚举

    /**
     * 配置状态
     * @return array
     */
    public static function status()
    {
        return [
            self::STATUS_ACTIVE => '启用',
            self::STATUS_DISABLED => '禁用',
        ];
    }

    /**
     * 配置分组
     * @return array
     */
    public static function groups()
    {
        return [
            '1' => '基本',
            '2' => '内容',
            '3' => '用户',
            '4' => '系统',
        ];
    }

    /**
     * 配置分组
     * @return array
     */
    public static function types()
    {
        return [
            self::CONFIG_TYPE_NUMBER => '数字',
            self::CONFIG_TYPE_STRING => '字符',
            self::CONFIG_TYPE_TEXT   => '文本',
            self::CONFIG_TYPE_ENUM   => '枚举',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'group', 'status', 'sort'], 'integer'],
            [['name', 'title', 'remark'], 'required'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 50],
            [['extra'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 100],
            [['name'], 'unique'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DISABLED]],
        ];
    }

    /**
     * 用 TimestampBehavior 自动填充 created_at 和 updated_at
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'       => '名称',
            'type'       => '类型',
            'title'      => '标题',
            'group'      => '分组',
            'extra'      => '配置项',
            'value'      => '值',
            'remark'     => '说明',
            'status'     => '状态',
            'sort'       => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return SystemConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SystemConfigQuery(get_called_class());
    }
}
