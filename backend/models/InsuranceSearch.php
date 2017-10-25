<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Insurance;

/**
 * InsuranceSearch represents the model behind the search form of `backend\models\Insurance`.
 */
class InsuranceSearch extends Insurance
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'insure_company_id', 'insure_type_id', 'product_id', 'id_card', 'prefix', 'province', 'zipcode', 'car_code', 'car_brand', 'car_model', 'plate_province', 'car_year', 'protect_start_date', 'protect_end_date', 'receive_date', 'member_id', 'insure_driver', 'driver_date_one', 'driver_date_two', 'insure_renew_date', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['inform_code', 'insure_code', 'insure_no', 'customer', 'address', 'district', 'city', 'phone', 'mobile', 'email', 'plate_license', 'body_no', 'machine_no', 'car_additional', 'body_model', 'car_usage', 'additional_protect', 'include_dis', 'driver_one', 'driver_two', 'beneficiary', 'remark'], 'safe'],
            [['insure_capital', 'total', 'grand_total'], 'number'],
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
        $query = Insurance::find();

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
            'insure_company_id' => $this->insure_company_id,
            'insure_type_id' => $this->insure_type_id,
            'product_id' => $this->product_id,
            'id_card' => $this->id_card,
            'prefix' => $this->prefix,
            'province' => $this->province,
            'zipcode' => $this->zipcode,
            'car_code' => $this->car_code,
            'car_brand' => $this->car_brand,
            'car_model' => $this->car_model,
            'plate_province' => $this->plate_province,
            'car_year' => $this->car_year,
            'protect_start_date' => $this->protect_start_date,
            'protect_end_date' => $this->protect_end_date,
            'insure_capital' => $this->insure_capital,
            'total' => $this->total,
            'grand_total' => $this->grand_total,
            'receive_date' => $this->receive_date,
            'member_id' => $this->member_id,
            'insure_driver' => $this->insure_driver,
            'driver_date_one' => $this->driver_date_one,
            'driver_date_two' => $this->driver_date_two,
            'insure_renew_date' => $this->insure_renew_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);
        
        if($this->globalSearch != ''){
            $query->orFilterWhere(['like', 'inform_code', $this->globalSearch])
            ->orFilterWhere(['like', 'insure_code', $this->globalSearch])
            ->orFilterWhere(['like', 'insure_no', $this->globalSearch])
            ->orFilterWhere(['like', 'customer', $this->globalSearch])
            ->orFilterWhere(['like', 'address', $this->globalSearch])
            ->orFilterWhere(['like', 'district', $this->globalSearch])
            ->orFilterWhere(['like', 'city', $this->globalSearch])
            ->orFilterWhere(['like', 'phone', $this->globalSearch])
            ->orFilterWhere(['like', 'mobile', $this->globalSearch])
            ->orFilterWhere(['like', 'email', $this->globalSearch])
            ->orFilterWhere(['like', 'plate_license', $this->globalSearch])
            ->orFilterWhere(['like', 'body_no', $this->globalSearch])
            ->orFilterWhere(['like', 'machine_no', $this->globalSearch])
            ->orFilterWhere(['like', 'car_additional', $this->globalSearch])
            ->orFilterWhere(['like', 'body_model', $this->globalSearch])
            ->orFilterWhere(['like', 'car_usage', $this->globalSearch])
            ->orFilterWhere(['like', 'additional_protect', $this->globalSearch])
            ->orFilterWhere(['like', 'include_dis', $this->globalSearch])
            ->orFilterWhere(['like', 'driver_one', $this->globalSearch])
            ->orFilterWhere(['like', 'driver_two', $this->globalSearch])
            ->orFilterWhere(['like', 'beneficiary', $this->globalSearch])
            ->orFilterWhere(['like', 'remark', $this->globalSearch]);
        }
       

        return $dataProvider;
    }
}
