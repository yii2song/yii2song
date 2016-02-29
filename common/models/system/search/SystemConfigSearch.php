<?php

namespace common\models\system\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\system\SystemConfig;

/**
 * SystemConfigSearch represents the model behind the search form about `common\models\system\SystemConfig`.
 */
class SystemConfigSearch extends SystemConfig
{
    public function rules()
    {
        return [
            [['id', 'type', 'group', 'status', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'title', 'extra', 'value', 'remark'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SystemConfig::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'         => $this->id,
            'type'       => $this->type,
            'group'      => $this->group,
            'status'     => $this->status,
            'sort'       => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'extra', $this->extra])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
