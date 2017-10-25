<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $party_id
 * @property int $party_type_id
 * @property string $name
 * @property int $contact_type_id
 * @property int $contact_txt
 * @property int $is_primary
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['phone1','email1'],'required'],
            [['email1','email2'],'email','message'=>'รูปแบบ Email ไม่ถูกต้อง'],
            [['party_id', 'party_type_id', 'contact_type_id', 'is_primary', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','contact_title'], 'integer'],
            [['name','contact_section', 'contact_txt','phone1','phone2','email1','email2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'party_id' => 'Party ID',
            'party_type_id' => 'Party Type ID',
            'name' => 'ชื่อผู้ติดต่อ',
            'contact_type_id' => 'ประเภท',
            'contact_txt' => 'รายละเอียด',
            'is_primary' => 'Is Primary',
            'contact_title' => 'คำนำหน้า',
            'contact_section' => 'หน่วยงานติดต่อ',
            'status' => 'สถานะ',
            'phone1' => 'เบอร์โทร 1',
            'phone2' => 'เบอร์โทร 2',
            'email1' => 'อีเมล์ 1',
            'email2' => 'อีเมล์ 2',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
