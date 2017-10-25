<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productprice;

/**
 * ProductpriceSearch represents the model behind the search form of `backend\models\Productprice`.
 */
class ProductpriceSearch extends Productprice
{
     public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'package_id', 'car_start_year', 'car_end_year', 'is_discount', 'is_introduce', 'is_line', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['amount_start', 'amount_end', 'total', 'alltotal'], 'number'],
            [['description'], 'safe'],
            [['globalSearch'],'string'],
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
        $query = Productprice::find();

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
            'product_id' => $this->product_id,
            'package_id' => $this->package_id,
            'car_start_year' => $this->car_start_year,
            'car_end_year' => $this->car_end_year,
            'amount_start' => $this->amount_start,
            'amount_end' => $this->amount_end,
            'total' => $this->total,
            'alltotal' => $this->alltotal,
            'is_discount' => $this->is_discount,
            'is_introduce' => $this->is_introduce,
            'is_line' => $this->is_line,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

         if($this->globalSearch != ''){
            $query->orFilterWhere(['like','description',$this->globalSearch]);
                  // ->orFilterWhere(['like','name',$this->globalSearch])
                  // ->orFilterWhere(['like','description',$this->globalSearch]);
        }

        return $dataProvider;
    }
}
