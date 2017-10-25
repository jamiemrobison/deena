<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "insure_payment".
 *
 * @property int $id
 * @property int $payment_date
 * @property string $payment_time
 * @property int $period_no
 * @property double $amount
 * @property string $remark
 * @property int $insure_no
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class InsurePayment extends \yii\db\ActiveRecord
{
    public $insure_temp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'insure_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['insure_no','payment_code'],'required'],
            [['period_no', 'insure_no', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','payment_method','bank_id','bank_account'], 'integer'],
            [['payment_time','payment_date', ], 'safe'],
            [['amount','fee'], 'number'],
            [['remark','attachfile','bank_account_name','insure_temp','payment_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_code' => 'เลขที่ชำระเงิน',
            'payment_date' => 'วันที่ชำระเงิน',
            'payment_time' => 'เวลา',
            'insure_temp'=>'เลขที่ใบแจ้ง',
            'period_no' => 'งวดที่',
            'amount' => 'จำนวนเงิน',
            'remark' => 'หมายเหตุ',
            'insure_no' => 'เลขที่ใบแจ้ง',
            'payment_method' => 'วิธีชำระเงิน',
            'bank_id' => 'ธนาคาร',
            'attachfile' => 'เอกสารแนบ',
            'bank_account' => 'เลขที่บัญชี',
            'bank_account_name' => 'ชื่อบัญชี',
            'status' => 'สถานะ',
            'fee'=>'หักค่าธรรมเนียม',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
