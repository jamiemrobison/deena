<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_package_condition".
 *
 * @property int $id
 * @property int $package_id
 * @property int $title_id
 * @property string $condition_text
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductPackageCondition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_package_condition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['title_id'],'required'],
            [['package_id', 'title_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['condition_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'รหัสแพ็กเกจ',
            'title_id' => 'เงื่อนไข',
            'condition_text' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
