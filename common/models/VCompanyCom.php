<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_company_com".
 *
 * @property int $insure_company_id
 * @property string $name
 * @property string $short_name
 */
class VCompanyCom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_company_com';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['insure_company_id'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'insure_company_id' => 'Insure Company ID',
            'name' => 'บริษัทประกัน',
            'short_name' => 'ชื่อย่อ',
        ];
    }
}
