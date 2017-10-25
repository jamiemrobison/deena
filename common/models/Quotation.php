<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property int $id
 * @property string $quotation_no
 * @property string $name
 * @property int $quotation_date
 * @property string $package_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quotation_no'],'required'],
            [['quotation_date', ],'safe'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by','plate_province','include_act','car_code','car_brand','car_model','has_part','prefix_id','car_year'], 'integer'],
            [['quotation_no', 'name', 'package_id','plate_category','plate_number','remark','fname','lname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quotation_no' => 'เลขที่ใบเสนอราคา',
            'name' => 'ชื่อ',
            'quotation_date' => 'วันที่',
            'package_id' => 'รหัสแพ็คเก็จ',
            'plate_category' =>'หมวด',
            'plate_number' =>'เลขทะเบียน',
            'plate_province' =>'จังหวัด',
            'car_code' =>'รหัสรถ',
            'car_brand' =>'ยี่ห้อ',
            'car_model' =>'รุ่น',
            'car_year' =>'ปีรถ',
            'has_part' =>'อุปกรณ์เสริม',
            'remark' =>'หมายเหตุ',
            'status' => 'สถานะ',
            'prefix_id'=>'คำนำหน้า',
            'fname'=>'ชื่อ',
            'lname'=>'นามสกุล',
            'include_act'=>'รวม พรบ.',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
