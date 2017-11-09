<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "capital_car_detail".
 *
 * @property int $id
 * @property int $capital_car_id
 * @property int $year_amount
 * @property string $yeat_text
 * @property double $capital_min
 * @property double $capital_max
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CapitalCarDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capital_car_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capital_car_id'],'required'],
            [['capital_car_id', 'year_amount', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['capital_min', 'capital_max'], 'number'],
            [['yeat_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'capital_car_id' => 'ทุนประกันรถ',
            'year_amount' => 'จำนวนปี',
            'yeat_text' => 'ปี',
            'capital_min' => 'ทุนต่ำสุด',
            'capital_max' => 'ทุนสูงสุด',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
