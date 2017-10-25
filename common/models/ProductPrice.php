<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_price".
 *
 * @property int $id
 * @property int $product_id
 * @property int $package_id
 * @property int $car_start_year
 * @property int $car_end_year
 * @property double $amount_start
 * @property double $amount_end
 * @property double $total
 * @property double $alltotal
 * @property int $is_discount
 * @property int $is_introduce
 * @property int $is_line
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id'],'required'],
            [['product_id', 'package_id', 'car_start_year', 'car_end_year', 'is_discount', 'is_introduce', 'is_line', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['amount_start','amount_end','total', 'alltotal','score'],'match','pattern' => '/^(?!0+\.00)(?=.{1,9}(\.|$))(?!0(?!\.))\d{1,3}(,\d{3})*(\.\d+)?$/']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'ผลิตภัณฑ์',
            'package_id' => 'แพ็กเก็จ',
            'car_start_year' => 'ปีรถจาก',
            'car_end_year' => 'ปีรถถึง',
            'amount_start' => 'ทุนเริ่ม',
            'amount_end' => 'ทุนถึง',
            'total' => 'เบี้ยสุทธิ',
            'alltotal' => 'เบี้ยรวม',
            'is_discount' => 'ส่วนลด',
            'is_introduce' => 'ค่าแนะนำ',
            'is_line' => 'ค่าสายงาน',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'score' =>'คะแนน',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
