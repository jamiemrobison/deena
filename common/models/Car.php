<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $car_code
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['car_code','name'],'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by','insure_type','car_code_id','type_id','act_id'], 'integer'],
            [['car_code', 'name', 'description','act_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_code' => 'รหัสรถ',
            'name' => 'ชื่อ',
            'description' => 'รายละเอียด',
            'car_code_id' => 'รหัสรถ',
            'act_code' => 'รหัส พรบ.',
            'status' => 'สถานะ',
            'type_id' => 'ประเภทรถ',
            'act_id' => 'รหัส พรบ.',
            'insure_type' => 'ประเภทประกันภัย',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
