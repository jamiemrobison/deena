<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "insure_company".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $logo
 * @property string $credit_limit
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class InsureCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'insure_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['name'],'unique'],
            [['credit_limit','reg_capital'],'match','pattern'=>'/^[0-9]+(,[0-9]+)*$/'],
           // [['credit_limit','reg_capital'],'match','pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,4})?$/'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by','found_date','vat'], 'integer'],
            [['name', 'short_name', 'logo','emergency_call','payment_term','dealer_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ',
            'short_name' => 'ชื่อย่อ',
            'logo' => 'โลโก้บริษัท',
            'credit_limit' => 'วงเงินเครดิต',
            'found_date' =>'วันที่ก่อตั้ง',
            'reg_capital' =>'ทุนจดทะเบียน',
            'vat'=>'ภาษี ณ ที่จ่าย',
            'emergency_call'=>'เบอร์อุบัติเหตุ',
            'status' => 'สถานะ',
            'dealer_id' => 'รหัสตัวแทน',
            'payment_term'=> 'เงื่อนไขชำระเงิน',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
