<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class Checkinsurebytype extends Model
{
    /**
     * @inheritdoc
     */
   public $carcode,$producttype;
    public function rules()
    {
        return [
            [['carcode','$producttype'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'carcode' => 'รหัสรถ',
            'brand' => 'ประเภทประกัน',
        
        ];
    }
}
