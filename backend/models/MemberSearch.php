<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Member;

/**
 * MemberSearch represents the model behind the search form of `backend\models\Member`.
 */
class MemberSearch extends Member
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'applied_date', 'expired_date', 'card_id', 'dob', 'card_into', 'card_into_expired', 'income_expect', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['member_code', 'intro_code', 'line_code', 'level_id', 'title_name', 'first_name', 'last_name', 'address', 'mobile', 'phone', 'email', 'line', 'career', 'bank_account'], 'safe'],
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
        $query = Member::find();

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
            'applied_date' => $this->applied_date,
            'expired_date' => $this->expired_date,
            'card_id' => $this->card_id,
            'dob' => $this->dob,
            'card_into' => $this->card_into,
            'card_into_expired' => $this->card_into_expired,
            'income_expect' => $this->income_expect,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);
        if($this->globalSearch != ''){
           $query->orFilterWhere(['like', 'member_code', $this->globalSearch])
            ->orFilterWhere(['like', 'intro_code', $this->globalSearch])
            ->orFilterWhere(['like', 'line_code', $this->globalSearch])
            //->orFilterWhere(['like', 'level_id', $this->level_id])
            ->orFilterWhere(['like', 'title_name', $this->globalSearch])
            ->orFilterWhere(['like', 'first_name', $this->globalSearch])
            ->orFilterWhere(['like', 'last_name', $this->globalSearch])
            ->orFilterWhere(['like', 'address', $this->globalSearch])
            ->orFilterWhere(['like', 'mobile', $this->globalSearch])
            ->orFilterWhere(['like', 'phone', $this->globalSearch])
            ->orFilterWhere(['like', 'email', $this->globalSearch])
            ->orFilterWhere(['like', 'line', $this->globalSearch])
            ->orFilterWhere(['like', 'career', $this->globalSearch])
            ->orFilterWhere(['like', 'bank_account', $this->globalSearch]);

        }
        
        return $dataProvider;
    }
}
