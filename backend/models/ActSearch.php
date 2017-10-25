<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Act;

/**
 * ActSearch represents the model behind the search form of `backend\models\Act`.
 */
class ActSearch extends Act
{
     public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'car_code', 'car_type_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['car_description'], 'safe'],
            [['tax_premium', 'tax', 'duty', 'all_premium', 'protect_amount'], 'number'],
             [['globalSearch'],'string']
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
        $query = Act::find();

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
            'car_code' => $this->car_code,
            'car_type_id' => $this->car_type_id,
            'tax_premium' => $this->tax_premium,
            'tax' => $this->tax,
            'duty' => $this->duty,
            'all_premium' => $this->all_premium,
            'protect_amount' => $this->protect_amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        if($this->globalSearch != ''){
            $query->orFilterWhere(['like','car_code',$this->globalSearch])
                  ->orFilterWhere(['like','car_type_id',$this->globalSearch]);
        }

        return $dataProvider;
    }
}
