<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_union_capital".
 *
 * @property int $cap_year
 * @property int $insure_company_id
 * @property string $brand_name
 * @property string $model_name
 * @property string $car_group
 * @property string $car_code
 * @property string $cpg
 * @property string $minmax
 * @property int $type
 * @property double $Y2
 * @property double $Y3
 * @property double $Y4
 * @property double $Y5
 * @property double $Y6
 * @property double $Y7
 * @property double $Y8
 * @property double $Y9
 * @property double $Y10
 * @property double $Y11
 * @property double $Y12
 * @property double $Y13
 * @property double $Y14
 * @property double $Y15
 * @property double $Y16
 * @property double $Y17
 * @property double $Y18
 * @property double $Y19
 * @property double $Y20
 * @property double $Y21
 * @property double $Y22
 * @property double $Y23
 * @property double $Y24
 * @property double $Y25
 */
class VUnionCapital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_union_capital';
    }

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
    public function attributeLabels()
    {
        return [
            'cap_year' => 'กระดานปี',
            'insure_company_id' => 'บริษัทประกัน',
            'brand_name' => 'ยี่ห้อ',
            'model_name' => 'รุ่น',
            'car_group' => 'กลุ่มรถ',
            'car_code' => 'รหัสรถ',
            'cpg' => 'Cpg',
            'minmax' => 'ประเภททุน',
            'type' => 'Type',
            'Y2' => '2 ปี',
            'Y3' => '3 ปี',
            'Y4' => '4 ปี',
            'Y5' => '5 ปี',
            'Y6' => '6 ปี',
            'Y7' => '7 ปี',
            'Y8' => '8 ปี',
            'Y9' => '9 ปี',
            'Y10' => '10 ปี',
            'Y11' => '11 ปี',
            'Y12' => '12 ปี',
            'Y13' => '13 ปี',
            'Y14' => '14 ปี',
            'Y15' => '15 ปี',
            'Y16' => '16 ปี',
            'Y17' => '17 ปี',
            'Y18' => '18 ปี',
            'Y19' => '19 ปี',
            'Y20' => '20 ปี',
            'Y21' => '21 ปี',
            'Y22' => '22 ปี',
            'Y23' => '23 ปี',
            'Y24' => '24 ปี',
            'Y25' => '25 ปี',
        ];
    }
}
