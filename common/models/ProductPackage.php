<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_package".
 *
 * @property int $id
 * @property int $company_insure
 * @property int $insure_type
 * @property string $name
 * @property int $start_date
 * @property int $end_date
 * @property int $service_type
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ProductPackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['company_insure','insure_type','name','package_code'],'required'],
            [['company_insure', 'insure_type', 'service_type', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by','promotion','car_code'], 'integer'],
            [['name','package_code'], 'string', 'max' => 255],
            [[ 'start_date', 'end_date'],'safe'],
            [['score_rate'],'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_code' => 'รห้สแพ็กเก็จ',
            'company_insure' => 'บริษัทประกัน',
            'insure_type' => 'ประเภทประกัน',
            'name' => 'ชื่อแพ็กเกจ',
            'start_date' => 'ใช้วันที่',
            'end_date' => 'สิ้นสุดวันที่',
            'service_type' => 'ประเภทการซ่อม',
            'status' => 'สถานะ',
            'score_rate' =>'อัตราคะแนน (%)',
            'promotion' => 'โปรโมชั่น',
            'car_code' => 'รหัสรถ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
