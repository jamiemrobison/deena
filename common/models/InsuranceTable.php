<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "insurance_table".
 *
 * @property int $id
 * @property string $inform_code
 * @property string $insure_code
 * @property int $insure_company_id
 * @property int $insure_type_id
 * @property int $product_id
 * @property string $insure_no
 * @property int $id_card
 * @property int $prefix
 * @property string $customer
 * @property string $address
 * @property string $district
 * @property string $city
 * @property int $province
 * @property int $zipcode
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property int $car_code
 * @property int $car_brand
 * @property int $car_model
 * @property string $plate_license
 * @property int $plate_province
 * @property string $body_no
 * @property string $machine_no
 * @property string $car_additional
 * @property string $body_model
 * @property int $car_year
 * @property string $car_usage
 * @property int $protect_start_date
 * @property int $protect_end_date
 * @property string $additional_protect
 * @property double $insure_capital
 * @property string $include_dis
 * @property double $total
 * @property double $grand_total
 * @property int $receive_date
 * @property int $member_id
 * @property int $insure_driver
 * @property string $driver_one
 * @property string $driver_two
 * @property int $driver_date_one
 * @property int $driver_date_two
 * @property int $insure_renew_date
 * @property string $beneficiary
 * @property string $remark
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class InsuranceTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'insurance_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['insure_code','insure_company_id','product_id','payment_method'],'required'],
             [['id_card'],'integer','integerPattern'=>'/^\s*[+-]?\d{13}\s*$/','message'=>'กรุณากรอกตัวเลข 13 หลัก'],
            [['insure_company_id', 'insure_type_id', 'product_id', 'prefix', 'province', 'zipcode', 'car_code', 'car_brand', 'car_model', 'plate_province', 'car_year', 'member_id', 'insure_driver', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['insure_capital', 'total', 'grand_total','act_amount','score','promotion'], 'number'],
            [[ 'protect_start_date', 'protect_end_date', 'receive_date', 'insure_renew_date', 'driver_date_one', 'driver_date_two',],'safe'],
            [['inform_code', 'insure_code', 'insure_no', 'customer', 'address', 'district', 'city', 'phone', 'mobile', 'email', 'plate_license', 'body_no', 'machine_no', 'car_additional', 'body_model', 'car_usage', 'additional_protect', 'include_dis', 'driver_one', 
             'driver_two', 'beneficiary', 'remark','plate_category','note_remark'], 'string', 'max' => 255],
            [['fname','lname','cc','seat','weight'],'string'],
            [['email'],'email'],
            [['note_empid','note_status','payment_method','quotation_id','package_id'],'integer'],
            [['note_date',],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inform_code' => 'เลขที่รับแจ้ง',
            'insure_code' => 'เลขที่ใบแจ้ง',
            'insure_company_id' => 'กธ.บริษัท',
            'insure_type_id' => 'กธ.ประเภท',
            'product_id' => 'ผลิตภัณฑ์',
            'insure_no' => 'เลขที่กรมธรรม์',
            'id_card' => 'บัตรประชาชน',
            'prefix' => 'คำนำหน้า',
            'customer' => 'ผู้เอาประกันภัย',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'address' => 'ที่อยู่',
            'district' => 'แขวง/ตำบล',
            'city' => 'เขต/อำเภอ',
            'province' => 'จังหวัด',
            'zipcode' => 'รหัสไปรษณีย์',
            'phone' => 'โทร',
            'mobile' => 'มือถือ',
            'email' => 'Email',
            'car_code' => 'รหัสรถ',
            'car_brand' => 'ยี่ห้อ',
            'car_model' => 'รุ่นรถ',
            'plate_category' => 'หมวด',
            'plate_license' => 'ทะเบียน',
            'plate_province' => 'จังหวัด',
            'body_no' => 'เลขตัวถัง',
            'machine_no' => 'เลขเครื่อง',
            'car_additional' => 'ที่นั่ง/น้ำหนัก/ซีซี',
            'body_model' => 'แบบตัวถัง',
            'car_year' => 'ปีรถ',
            'car_usage' => 'การใช้รถ',
            'protect_start_date' => 'วันเริ่มคุ้มครอง',
            'protect_end_date' => 'สิ้นสุดคุ้มครอง',
            'additional_protect' => 'ความคุ้มครองเพิ่ม',
            'insure_capital' => 'ทุนประกัน',
            'include_dis' => 'ทุนหายไฟไหม้',
            'total' => 'เบี้ยสุทธิ',
            'grand_total' => 'เบี้ยรวม',
            'receive_date' => 'วันที่รับแจ้ง',
            'member_id' => 'รหัสตัวแทน',
            'insure_driver' => 'ประเภทประกัน',
            'driver_one' => 'ชื่อ 1',
            'driver_two' => 'ชื่อ 2',
            'driver_date_one' => 'วัน/เดือน/ปี เกิด',
            'driver_date_two' => 'วัน/เดือน/ปี เกิด',
            'insure_renew_date' => 'กำหนดต่อภาษี',
            'beneficiary' => 'ผู้รับผลประโยชน์',
            'remark' => 'หมายเหตุ',
            'status' => 'สถานะ',
            'seat' => 'ที่นั่ง',
            'weight' => 'น้ำหนัก',
            'cc' => 'ซีซี',
            'level_id' =>'ระดับสมาชิก',
            'intro_id' => 'รหัสสมาชิกแนะนำ',
            'line_id' => 'รหัสสายงาน',
            'act_amount' => 'เบี้ยนำส่ง',
            'score' => 'คะแนน',
            'note_date' =>'วันที่',
            'note_remark' => 'สลักหลัง',
            'note_empid' =>'ผู้บันทึก',
            'note_status'=>'สถานะ',
            'promotion' => 'โปรโมชั่น',
            'photo_contact' => 'ชื่อผู้ติดต่อ',
            'photo_number' => 'เบอร์โทร',
            'photo_remark' =>'หมายเหตุ',
            'payment_method' => 'วิธีชำระเงิน',
            'quotation_id'=>'ใบเสนอราคา',
            'package_id' => 'รหัสแพ็กเก็จ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
