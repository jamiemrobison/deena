<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Packagedetail;

/**
 * PackagedetailSearch represents the model behind the search form of `backend\models\Packagedetail`.
 */
class PackagedetailSearch extends Packagedetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'package_id', 'coverage_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'amount'], 'integer'],
            [['converage_detail'], 'safe'],
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
        $query = Packagedetail::find();

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
            'package_id' => $this->package_id,
            'coverage_type' => $this->coverage_type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'amount' => $this->amount,
        ]);

        $query->andFilterWhere(['like', 'converage_detail', $this->converage_detail]);

        return $dataProvider;
    }
}
