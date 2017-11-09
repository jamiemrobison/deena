<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VUnionCapital;

/**
 * ActprotectSearch represents the model behind the search form of `backend\models\Actprotect`.
 */
class VunioncapSearch extends VUnionCapital
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
            [['cap_year', 'insure_company_id', 'type'], 'integer'],
             [['Y2', 'Y3', 'Y4', 'Y5', 'Y6', 'Y7', 'Y8', 'Y9', 'Y10', 'Y11', 'Y12', 'Y13', 'Y14', 'Y15', 'Y16', 'Y17', 'Y18', 'Y19', 'Y20', 'Y21', 'Y22', 'Y23', 'Y24', 'Y25'], 'number'],
            [['brand_name', 'model_name', 'car_group', 'car_code', 'cpg'], 'string', 'max' => 255],
            [['minmax'], 'string', 'max' => 6],
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
        $query = VUnionCapital::find();

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
        // $query->andFilterWhere([
        //    // 'id' => $this->id,
        //     'brand_name' => $this->brand_name,
        //     'model_name' => $this->brand_name,
        //     'car_group' => $this->car_group,
        //     'car_code' => $this->car_code,
        //     // 'status' => $this->status,
        //     // 'created_at' => $this->created_at,
        //     // 'updated_at' => $this->updated_at,
        //     // 'created_by' => $this->created_by,
        //     // 'updated_by' => $this->updated_by,
        // ]);

        //if($this->globalSearch != ''){
            $query->orFilterWhere(['like','cap_year',$this->cap_year])
                  ->orFilterWhere(['like','brand_name',$this->brand_name])
                    ->orFilterWhere(['like','model_name',$this->model_name])
                    ->orFilterWhere(['like','car_group',$this->car_group])
                    ->orFilterWhere(['like','car_code',$this->car_code]);
                 // ->andFilterWhere(['like','insure_company_id',$this->insure_company_id]);
        //}

        return $dataProvider;
    }
}
