<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_comp".
 *
 * @property int $id
 * @property int $role_id
 * @property int $duty_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class RoleComp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_comp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id','duty'],'required'],
            [['role_id', 'duty_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'บทบาท',
            'duty_id' => 'หน้าที่',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
