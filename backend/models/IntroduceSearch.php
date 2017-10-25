<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Introduce;

/**
 * IntroduceSearch represents the model behind the search form of `backend\models\Introduce`.
 */
class IntroduceSearch extends Introduce
{
     public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'disc_per', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['intro_code', 'name', 'condition', 'description'], 'safe'],
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
        $query = Introduce::find();

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
            'disc_per' => $this->disc_per,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        if($this->globalSearch != ''){
          $query->orFilterWhere(['like', 'intro_code', $this->globalSearch])
            ->orFilterWhere(['like', 'name', $this->globalSearch])
            ->orFilterWhere(['like', 'condition', $this->globalSearch])
            ->orFilterWhere(['like', 'description', $this->globalSearch]);

        }
        

        return $dataProvider;
    }
}
