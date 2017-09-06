<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $email
 * @property string $address
 * @property int $zipcode
 * @property string $phone
 * @property string $mobile
 * @property string $logo
 * @property string $taxid
 * @property string $website
 * @property string $facebook
 * @property string $line
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['zipcode', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'email', 'address', 'phone', 'mobile', 'logo', 'taxid', 'website', 'facebook', 'line','license_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อร้าน',
            'description' => 'รายละเอียด',
            'email' => 'Email',
            'address' => 'ที่อยู่',
            'zipcode' => 'รหัสไปรษณีย์',
            'phone' => 'โทร',
            'mobile' => 'มือถือ',
            'logo' => 'Logo',
            'taxid' => 'เลขที่เสียภาษี',
            'website' => 'เว็บไซต์',
            'facebook' => 'Facebook',
            'line' => 'Line',
           'license_no' => 'เลขที่ใบอนุญาต',
            'status' => 'สถาณะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
