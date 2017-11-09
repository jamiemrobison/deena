<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "capital_car".
 *
 * @property int $id
 * @property int $cap_year_id
 * @property int $brand_id
 * @property int $model_id
 * @property string $brand_name
 * @property string $model_name
 * @property string $car_group
 * @property string $car_code
 * @property string $cpg
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CapitalCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capital_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id'],'required'],
            [['cap_year_id', 'brand_id', 'model_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['brand_name', 'model_name', 'car_group', 'car_code', 'cpg', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cap_year_id' => 'ทุนปี',
            'brand_id' => 'ยี่ห้อ',
            'model_id' => 'รุ่น',
            'brand_name' => 'Brand Name',
            'model_name' => 'Model Name',
            'car_group' => 'กลุ่มรถ',
            'car_code' => 'รหัส',
            'cpg' => 'Cpg',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
