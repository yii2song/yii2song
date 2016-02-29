<?php

namespace backend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%backend_user}}".
 *
 * @property integer $user_id
 * @property integer $role_id
 */
class BackendUserSearch extends BackendUser
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
            [['user_id'], 'required'],
            [['user_id', 'role_id'], 'integer'],
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
        $query = BackendUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->user_id,
            'user_id' => $this->role_id,
        ]);

//        $query->andFilterWhere(['like', 'name', $this->name])
//            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
