<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Payment;

/**
 * PaymentSearch represents the model behind the search form of `backend\models\Payment`.
 */
class PaymentSearch extends Payment
{
     public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'payment_date', 'period_no', 'insure_no', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['payment_time', 'remark'], 'safe'],
            [['amount'], 'number'],
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
        $query = Payment::find();

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
            'payment_date' => $this->payment_date,
            'payment_time' => $this->payment_time,
            'period_no' => $this->period_no,
            'amount' => $this->amount,
            'insure_no' => $this->insure_no,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

       if($this->globalSearch != ''){
            $query->orFilterWhere(['like','period_no',$this->globalSearch])
                  ->orFilterWhere(['like','payment_date',$this->globalSearch])
                  ->orFilterWhere(['like','insure_no',$this->globalSearch]);
        }

        return $dataProvider;
    }
}
