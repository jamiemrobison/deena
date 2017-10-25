<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation_detail".
 *
 * @property int $id
 * @property int $quatation_id
 * @property int $car_id
 * @property int $car_code
 * @property int $package_id
 * @property double $amount
 * @property double $total_amount
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class QuotationDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quatation_id', 'car_id', 'car_code', 'package_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['amount', 'total_amount','act_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quatation_id' => 'Quatation ID',
            'car_id' => 'Car ID',
            'car_code' => 'Car Code',
            'package_id' => 'Package ID',
            'amount' => 'Amount',
            'total_amount' => 'Total Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
