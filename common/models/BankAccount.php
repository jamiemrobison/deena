<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank_account".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $account_no
 * @property string $brance
 * @property int $bank_id
 * @property int $party_type_id
 * @property int $party_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class BankAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','account_no','bank_id'],'required'],
            [['bank_id', 'party_type_id', 'party_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','account_type'], 'integer'],
            [['name', 'short_name', 'account_no', 'brance'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อบัญชี',
            'short_name' => 'ชื่อย่อ',
            'account_no' => 'เลขที่บัญชี',
            'account_type' => 'ประเภทบัญชี',
            'brance' => 'สาขา',
            'bank_id' => 'ธนาคาร',
            'party_type_id' => 'Party Type ID',
            'party_id' => 'Party ID',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
