<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "docu_ref".
 *
 * @property int $id
 * @property int $doc_type
 * @property int $doc_group_id
 * @property string $name
 * @property int $party_type_id
 * @property int $party_id
 * @property string $description
 * @property string $filename
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class DocuRef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docu_ref';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['doc_type','doc_group_id'],'required'],
            [['doc_type', 'doc_group_id', 'party_type_id', 'party_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'filename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_type' => 'ประเภทไฟล์',
            'doc_group_id' => 'กลุ่มไฟล์',
            'name' => 'ชื่อไฟล์',
            'party_type_id' => 'Party Type ID',
            'party_id' => 'Party ID',
            'description' => 'รายละเอียด',
            'filename' => 'Filename',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
