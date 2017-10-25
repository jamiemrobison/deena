<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $member_code
 * @property string $intro_code
 * @property string $line_code
 * @property string $level_id
 * @property int $applied_date
 * @property int $expired_date
 * @property string $title_name
 * @property string $first_name
 * @property string $last_name
 * @property int $card_id
 * @property int $dob
 * @property string $address
 * @property string $mobile
 * @property string $phone
 * @property string $email
 * @property string $line
 * @property string $career
 * @property int $card_into
 * @property int $card_into_expired
 * @property string $bank_account
 * @property int $income_expect
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['card_id'],'unique'],
        [['card_id'],'integer','integerPattern'=>'/^\s*[+-]?\d{13}\s*$/','message'=>'กรุณากรอกตัวเลข 13 หลัก'],
        [['member_code','first_name','last_name','level_id'],'required'],
        [['dob','applied_date','expired_date','card_into_expired'],'safe'],
        [['income_expect'],'match','pattern'=>'/^[0-9]+(,[0-9]+)*$/'],
        [[ 'email'],'email','message'=>'รูปแบบ email ไม่ถูกต้อง'],
            [[ 'card_into','status', 'created_at', 'updated_at', 'created_by', 'updated_by','is_into',
              'district','amphur','province','zipcode','member_into'], 'integer'],
            [['member_code', 'intro_code', 'line_code', 'level_id', 'title_name', 'first_name', 'last_name', 'address', 'mobile', 'phone', 'line', 'career', 'bank_account','photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_code' => 'รหัสสมาชิก',
            'intro_code' => 'รหัสแนะนำ',
            'line_code' => 'รหัสสายงาน',
            'level_id' => 'ระดับสมาชิก',
            'applied_date' => 'วันที่สมัคร',
            'expired_date' => 'หมดอายุสมาชิก',
            'title_name' => 'คำนำหน้า',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'card_id' => 'เลขบัตรประชาชน',
            'dob' => 'วันเกิด',
            'address' => 'ที่อยู่',
            'photo' => 'รูปภาพ',
            'mobile' => 'มือถือ',
            'phone' => 'โทรศัพท์',
            'email' => 'Email',
            'line' => 'Line',
            'career' => 'อาชีพ',
            'is_into' => 'นายหน้า',
            'card_into' => 'บัตรนายหน้า',
            'card_into_expired' => 'หมดอายุบัตรนายหน้า',
            'bank_account' => 'บัญชีนายหน้า',
            'income_expect' => 'รายได้ที่ต้องการ',
            'status' => 'สถานะ',
            'district' => 'ตำบล',
            'amphur' =>'อำเภอ',
            'province' => 'จังหวัด',
             'zipcode' => 'รหัสไปรษณีย์',
             'member_into' => 'สมาชิกแนะนำ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
