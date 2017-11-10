<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "actprotect".
 *
 * @property int $id
 * @property int $protect_id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Actprotect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actprotect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['protect_id','name'],'required'],
            [['protect_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
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
            'protect_id' => 'ประเภทความคุ้มครอง',
            'name' => 'ชื่อความคุ้มครอง',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
