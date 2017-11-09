<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "capital_min".
 *
 * @property int $id
 * @property int $capital_car_id
 * @property double $min
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CapitalMin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capital_min';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capital_car_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['min'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'capital_car_id' => 'Capital Car ID',
            'min' => 'Min',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
