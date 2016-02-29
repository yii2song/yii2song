<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 17:17
 */
namespace backend\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BackendRoleSearch extends BackendRole
{
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'data'], 'required'],
            [['data'], 'string'],
            [['status', 'is_default', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'safe'],
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
            'status' => '1=启用，2=禁用',
            'is_default' => '用户默认添加此角色',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BackendRole::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
//            'name' => $this->name,
//            'data' => $this->data,
            'status' => $this->status,
            'is_default' => $this->is_default,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}