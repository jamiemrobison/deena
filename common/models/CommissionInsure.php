<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commission_insure".
 *
 * @property int $id
 * @property int $insure_type
 * @property string $promotion_name
 * @property int $commission_percent
 * @property int $commission_amont
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CommissionInsure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commission_insure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['insure_type'],'required'],
            [['insure_type', 'commission_percent', 'commission_amont', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['promotion_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'insure_type' => 'กรมธรรม์',
            'promotion_name' => 'ชื่อโปรโมชั่น',
            'commission_percent' => 'เปอร์เซ็นต์',
            'commission_amont' => 'จำนวน',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
