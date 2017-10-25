<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "permission".
 *
 * @property int $id
 * @property int $position_id
 * @property int $menu_id
 * @property int $menu_type_id
 * @property string $name
 * @property string $description
 * @property int $is_view
 * @property int $is_delete
 * @property int $is_update
 * @property int $is_insert
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Permission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_id', 'menu_id', 'menu_type_id', 'is_view', 'is_delete', 'is_update', 'is_insert',
             'is_approve', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
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
            'position_id' => 'Position ID',
            'menu_id' => 'Menu ID',
            'menu_type_id' => 'Menu Type ID',
            'name' => 'Name',
            'description' => 'Description',
            'is_view' => 'Is View',
            'is_delete' => 'Is Delete',
            'is_update' => 'Is Update',
            'is_insert' => 'Is Insert',
            'is_approve' => 'Is Approve',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
