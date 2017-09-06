<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_info".
 *
 * @property int $id
 * @property int $brand
 * @property string $model
 * @property string $car_year
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CarInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['brand','model'],'required'],
            [['brand', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','car_year'], 'integer'],
            [['model'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'ยี่ห้อ',
            'model' => 'รุ่น',
            'car_year' => 'ปีรถ',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
