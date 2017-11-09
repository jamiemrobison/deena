<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "insure_package".
 *
 * @property int $id
 * @property int $insure_id
 * @property int $package_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class InsurePackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'insure_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['insure_id', 'package_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'insure_id' => 'ใบแจ้งงาน',
            'package_id' => 'รหัสแพ็กเก็จ',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
