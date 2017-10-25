<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "duty_comp".
 *
 * @property int $id
 * @property int $duty_id
 * @property int $privilage_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class DutyComp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'duty_comp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['duty_id', 'privilage_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'duty_id' => 'Duty ID',
            'privilage_id' => 'Privilage ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
