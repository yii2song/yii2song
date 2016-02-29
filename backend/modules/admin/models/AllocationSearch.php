<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 15:10
 */
namespace backend\modules\admin\models;

use yii\data\ActiveDataProvider;

class AllocationSearch extends \yii\base\Model
{
    public $id;
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => 'ID',
            'username' => '用户名',
            'role'     => '角色类型',
        ];
    }

    public function search($params, $class, $usernameField)
    {
        $query = $class::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', $usernameField, $this->username]);

        return $dataProvider;
    }
}