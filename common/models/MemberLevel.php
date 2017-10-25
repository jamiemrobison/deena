<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_level".
 *
 * @property int $id
 * @property string $level
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
class MemberLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['level'],'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['level', 'name', 'condition', 'description'], 'string', 'max' => 255],
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
            'level' => 'ระดับ',
            'name' => 'ชื่อ',
            'condition' => 'เงื่อนไข',
            'description' => 'รายละเอียด',
            'disc_per' => '% ส่วนลด',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
