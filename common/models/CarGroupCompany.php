<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_group_company".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CarGroupCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_group_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by','insure_company_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อกลุ่ม',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'insure_company_id'=>'บริษัทประกัน',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
