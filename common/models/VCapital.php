<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_capital".
 *
 * @property int $id
 * @property int $cap_year
 * @property int $insure_company_id
 * @property int $cap_year_id
 * @property int $brand_id
 * @property int $model_id
 * @property string $brand_name
 * @property string $model_name
 * @property string $car_group
 * @property string $car_code
 * @property string $cpg
 * @property string $description
 * @property int $capital_car_id
 * @property int $year_count
 * @property string $year_text
 * @property double $min
 * @property double $max
 */
class VCapital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_capital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cap_year', 'insure_company_id', 'cap_year_id', 'brand_id', 'model_id', 'capital_car_id', 'year_count'], 'integer'],
            [['min', 'max'], 'number'],
            [['brand_name', 'model_name', 'car_group', 'car_code', 'cpg', 'description', 'year_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cap_year' => 'Cap Year',
            'insure_company_id' => 'Insure Company ID',
            'cap_year_id' => 'Cap Year ID',
            'brand_id' => 'Brand ID',
            'model_id' => 'Model ID',
            'brand_name' => 'Brand Name',
            'model_name' => 'Model Name',
            'car_group' => 'Car Group',
            'car_code' => 'Car Code',
            'cpg' => 'Cpg',
            'description' => 'Description',
            'capital_car_id' => 'Capital Car ID',
            'year_count' => 'Year Count',
            'year_text' => 'Year Text',
            'min' => 'Min',
            'max' => 'Max',
        ];
    }
}
