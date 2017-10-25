<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_channel".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PaymentChannel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
         [['name'],'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by','is_bank_transfer','is_cash','is_credit','is_installment','type_id'], 'integer'],
            [['name', 'short_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ช่องทางชำระเงิน',
            'short_name' => 'ชื่อย่อ',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'is_bank_transfer' =>'Transfer Bank',
            'is_cash'=>'Cash',
            'is_credit'=>'Credit',
            'is_installment'=>'Installment',
            'type_id'=>'ประภเท',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
