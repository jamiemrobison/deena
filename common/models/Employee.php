<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $employee_code
 * @property string $first_name
 * @property string $last_name
 * @property int $position_id
 * @property string $phone
 * @property string $photo
 * @property int $user_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['first_name','last_name','user_id','phone','prefix_name'],'required'],
            [['position_id', 'user_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','prefix_name'], 'integer'],
            [['employee_code', 'first_name', 'last_name', 'phone', 'photo','email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prefix_name'=>'คำนำหน้า',
            'employee_code' => 'รหัสพนักงาน',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'position_id' => 'ตำแหน่ง',
            'phone' => 'โทรศัพท์',
            'photo' => 'รูปภาพ',
            'user_id' => 'ผู้ใช้งาน',
            'status' => 'สถานะ',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
