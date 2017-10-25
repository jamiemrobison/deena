<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "line".
 *
 * @property int $id
 * @property string $line_code
 * @property string $name
 * @property string $condition
 * @property string $description
 * @property int $disc_per
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Line extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['line_code','disc_per'],'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['line_code', 'name', 'condition', 'description'], 'string', 'max' => 255],
            [['disc_per'],'match','pattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_code' => 'รหัสสายงาน',
            'name' => 'ชื่อ',
            'condition' => 'เงื่อนไข',
            'description' => 'คำอธิบาย',
            'disc_per' => '% ส่วนลด',
            'status' => 'สถาณะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
