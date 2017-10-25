<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "package_car".
 *
 * @property int $id
 * @property int $package_id
 * @property int $car_id
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PackageCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id', 'car_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'Package ID',
            'car_id' => 'Car ID',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
