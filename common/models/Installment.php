<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "installment".
 *
 * @property int $id
 * @property int $payment_type
 * @property int $period
 * @property double $first_period
 * @property int $remain
 * @property double $period_per
 * @property string $description
 * @property double $fee
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Installment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'installment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_type','period'],'required'],
            [['payment_type', 'period', 'remain', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','insure_no'], 'integer'],
           //[['first_period', 'period_per', 'fee'], 'number'],
            [['description'], 'string', 'max' => 255],
            [['first_period','period_per','fee'],'match','pattern' => '(/^\d*\.?\d*[0-9]+\d*$)|(^[0-9]+\d*\.\d*$)/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_type' => 'ประเภทการผ่อน',
            'period' => 'ผ่อนชำระ(งวด)',
            'first_period' => 'งวดแรกชำระ(บาท)',
            'remain' => 'คงเหลือชำระ(งวด)',
            'period_per' => 'ผ่อนงวดละ(บาท)',
            'description' => 'รายละเอียด',
            'fee' => 'รับค่าธรรมเนียม(บาท)',
            'status' => 'สถานะ',
            'insure_no' => 'เลขที่ใบแจ้ง',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
