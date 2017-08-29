<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $party_id
 * @property int $party_type_id
 * @property string $name
 * @property int $contact_type_id
 * @property int $contact_txt
 * @property int $is_primary
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id', 'party_type_id', 'contact_type_id', 'contact_txt', 'is_primary', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'party_id' => 'Party ID',
            'party_type_id' => 'Party Type ID',
            'name' => 'Name',
            'contact_type_id' => 'Contact Type ID',
            'contact_txt' => 'Contact Txt',
            'is_primary' => 'Is Primary',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
