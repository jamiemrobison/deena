<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property double $amount
 * @property int $promotion_type
 * @property int $start_date
 * @property int $end_date
 * @property string $photo
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['code','name'],'required'],
            [['amount'], 'number'],
            [['start_date', 'end_date'],'safe'],
            [['promotion_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['code', 'name', 'description', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'รหัสโปรโมชั่น',
            'name' => 'ชื่อโปรโมชั่น',
            'description' => 'รายละเอียด',
            'amount' => 'จำนวนเงิน',
            'promotion_type' => 'ประเภทโปรโมชั่น',
            'start_date' => 'ตั้งแต่วันที่',
            'end_date' => 'ถึงวันที่',
            'photo' => 'รูปภาพ',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
