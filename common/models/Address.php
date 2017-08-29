<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $party_id
 * @property int $party_type_id
 * @property int $address_type_id
 * @property string $address
 * @property int $zipcode
 * @property int $province
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id', 'party_type_id', 'address_type_id', 'zipcode', 'province', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string', 'max' => 255],
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
            'address_type_id' => 'Address Type ID',
            'address' => 'Address',
            'zipcode' => 'Zipcode',
            'province' => 'Province',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
