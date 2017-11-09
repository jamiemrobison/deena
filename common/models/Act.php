<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "act".
 *
 * @property int $id
 * @property int $car_code
 * @property int $car_type_id
 * @property string $car_description
 * @property double $tax_premium
 * @property double $tax
 * @property double $duty
 * @property double $all_premium
 * @property double $protect_amount
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Act extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'act';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_code_id','car_type_id'],'required'],
           // [['car_code'],'match','pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,4})?$/'],
           // [['car_code'],'match','pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,4})?$/'],
            [['car_type_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','act_code_id'], 'integer'],
            [['tax', 'duty', 'score_rate'], 'number'],
            [['car_description','car_code'], 'string', 'max' => 255],
            [['protect_amount','score'],'safe'],
           // [['all_premium'],'match','pattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/']
              [['all_premium','tax_premium'],'match','pattern' => '/^(?!0+\.00)(?=.{1,9}(\.|$))(?!0(?!\.))\d{1,3}(,\d{3})*(\.\d+)?$/']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_code' => 'รหัสพรบ',
            'act_code_id' => 'รหัสรถ',
            'car_type_id' => 'ประเภทรถ',
            'car_description' => 'ลักษณะรถ',
            'tax_premium' => 'เบี้ยสุทธิ',
            'tax' => 'ภาษี',
            'duty' => 'อากร',
            'all_premium' => 'เบี้ยรวม',
            'protect_amount' => 'คุ้มครอง',
            'score_rate'=>'อัตราคะแนน%',
            'score'=>'คะเแนน',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
