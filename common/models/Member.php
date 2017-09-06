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
        [['member_code','first_name','last_name','level_id'],'required'],
            [['applied_date', 'expired_date', 'card_id', 'dob', 'card_into', 'card_into_expired', 'income_expect', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['member_code', 'intro_code', 'line_code', 'level_id', 'title_name', 'first_name', 'last_name', 'address', 'mobile', 'phone', 'email', 'line', 'career', 'bank_account','photo'], 'string', 'max' => 255],
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
            'intro_code' => 'รหัสผู้แนะนำ',
            'line_code' => 'รหัสสายงาน',
            'level_id' => 'ระดับสมาชิก',
            'applied_date' => 'วันที่สมัคร',
            'expired_date' => 'วันหมดอายุ',
            'title_name' => 'คำนำหน้า',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'card_id' => 'เลขบัตรประชาชน',
            'dob' => 'วันเกิด',
            'address' => 'ที่อยู่',
            'mobile' => 'มือถือ',
            'phone' => 'โทรศัพท์',
            'email' => 'Email',
            'line' => 'Line',
            'career' => 'อาชีพ',
            'card_into' => 'บัตรนายหน้า',
            'card_into_expired' => 'วันหมดอายุบัตร',
            'bank_account' => 'เลขที่บัญชี',
            'income_expect' => 'รายได้ที่ต้องการ',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
