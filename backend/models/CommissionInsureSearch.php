<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CommissionInsure;

/**
 * CommissionInsureSearch represents the model behind the search form of `backend\models\CommissionInsure`.
 */
class CommissionInsureSearch extends CommissionInsure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'insure_type', 'commission_percent', 'commission_amont', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['promotion_name', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = CommissionInsure::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'insure_type' => $this->insure_type,
            'commission_percent' => $this->commission_percent,
            'commission_amont' => $this->commission_amont,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'promotion_name', $this->promotion_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
