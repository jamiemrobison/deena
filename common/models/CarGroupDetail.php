<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_group_detail".
 *
 * @property int $id
 * @property int $group_id
 * @property int $brand
 * @property int $model
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CarGroupDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_group_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'],'required'],
            [['group_id', 'brand', 'model', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
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
            'group_id' => 'กลุ่ม',
            'brand' => 'ยี่ห้อ',
            'model' => 'รุ่น',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
