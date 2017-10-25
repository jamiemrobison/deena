<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "privilage".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $module_type
 * @property int $action_id
 * @property int $permission
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Privilage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'privilage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_type', 'action_id', 'permission', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'module_type' => 'Module Type',
            'action_id' => 'Action ID',
            'permission' => 'Permission',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
