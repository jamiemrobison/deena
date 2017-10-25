<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_package_detail".
 *
 * @property int $id
 * @property int $package_id
 * @property int $coverage_type
 * @property string $converage_detail
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductPackageDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_package_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id'],'required'],
            [['package_id','actprotect_id', 'coverage_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','amount'], 'integer'],
            [['converage_detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'Package ID',
            'coverage_type' => 'ประเภทความคุ้มครอง',
            'converage_detail' => 'รายละเอียด',
            'actprotect_id' => 'รายการความคุ้มครอง',
            'amount' => 'จำนวนเงิน',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
