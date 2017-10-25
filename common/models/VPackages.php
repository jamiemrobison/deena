<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_packages".
 *
 * @property int $package_id
 * @property string $package_name
 * @property int $coverage_type
 * @property string $converage_detail
 * @property int $actprotect_id
 * @property int $amount
 * @property string $actprotect_name
 */
class VPackages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_packages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id', 'coverage_type', 'actprotect_id', 'amount'], 'integer'],
            [['package_name', 'converage_detail', 'actprotect_name','company_insure'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'package_id' => 'Package ID',
            'package_name' => 'Package Name',
            'coverage_type' => 'Coverage Type',
            'converage_detail' => 'Converage Detail',
            'actprotect_id' => 'Actprotect ID',
            'amount' => 'Amount',
            'actprotect_name' => 'Actprotect Name',
        ];
    }
}
