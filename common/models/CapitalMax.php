<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "capital_max".
 *
 * @property int $id
 * @property int $capital_car_id
 * @property double $max
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class CapitalMax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capital_max';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capital_car_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['max'], 'number'],
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
            'max' => 'Max',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
