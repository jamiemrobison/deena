<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_package_promotion".
 *
 * @property int $id
 * @property int $package_id
 * @property int $promotion_id
 * @property string $description
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductPackagePromotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_package_promotion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id','promotion_id'],'required'],
            [['package_id', 'promotion_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'รหัสแพ็กเก็จ',
            'promotion_id' => 'โปรโมชั่น',
            'description' => 'รายละเอียด',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
