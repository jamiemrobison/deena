<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "introduce".
 *
 * @property int $id
 * @property string $intro_code
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
class Introduce extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'introduce';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intro_code','name'],'required'],
            [['disc_per', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['intro_code', 'name', 'condition', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'intro_code' => 'รหัสค่าแนะนำ',
            'name' => 'ชื่อ',
            'condition' => 'เงื่อนไข',
            'description' => 'รายละเอียด',
            'disc_per' => '%ส่วนลด',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
