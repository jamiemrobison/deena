<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "capital_car_temp".
 *
 * @property int $id
 * @property string $brand_name
 * @property string $model_name
 * @property string $car_group
 * @property string $car_code
 * @property string $cpg
 * @property string $description
 * @property string $minmax
 * @property double $A1
 * @property double $A2
 * @property double $A3
 * @property double $A4
 * @property double $A5
 * @property double $A6
 * @property double $A7
 * @property double $A8
 * @property double $A9
 * @property double $A10
 * @property double $A11
 * @property double $A12
 * @property double $A13
 * @property double $A14
 * @property double $A15
 * @property double $A16
 * @property double $A17
 * @property double $A18
 * @property double $A19
 * @property double $A20
 * @property double $A21
 * @property double $A22
 * @property double $A23
 * @property double $A24
 * @property double $A25
 */
class CapitalCarTemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capital_car_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10', 'A11', 'A12', 'A13', 'A14', 'A15', 'A16', 'A17', 'A18', 'A19', 'A20', 'A21', 'A22', 'A23', 'A24', 'A25'], 'number'],
            [['brand_name', 'model_name', 'car_group', 'car_code', 'cpg', 'description', 'minmax'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => 'Brand Name',
            'model_name' => 'Model Name',
            'car_group' => 'Car Group',
            'car_code' => 'Car Code',
            'cpg' => 'Cpg',
            'description' => 'Description',
            'minmax' => 'Minmax',
            'A1' => 'A1',
            'A2' => 'A2',
            'A3' => 'A3',
            'A4' => 'A4',
            'A5' => 'A5',
            'A6' => 'A6',
            'A7' => 'A7',
            'A8' => 'A8',
            'A9' => 'A9',
            'A10' => 'A10',
            'A11' => 'A11',
            'A12' => 'A12',
            'A13' => 'A13',
            'A14' => 'A14',
            'A15' => 'A15',
            'A16' => 'A16',
            'A17' => 'A17',
            'A18' => 'A18',
            'A19' => 'A19',
            'A20' => 'A20',
            'A21' => 'A21',
            'A22' => 'A22',
            'A23' => 'A23',
            'A24' => 'A24',
            'A25' => 'A25',
        ];
    }
}
