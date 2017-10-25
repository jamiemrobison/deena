<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class Checkinsure extends Model
{
    /**
     * @inheritdoc
     */
   public $brand,$model,$year,$product,$include_act,$carcode,$usetype;
    public function rules()
    {
        return [
            [['brand','model'],'integer'],
            [['year','product','include_act','carcode','usetype'],'integer'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product' => 'ผลิตภัณฑ์',
            'brand' => 'ยี่ห้อ',
            'model' => 'รุ่นรถ',
            'year' => 'ปีรถ',
            'carcode' =>'รหัสรถ',
            'usetype' => 'ประเภทการใช้งานรถ',
            'include_act'=>'รวม พรบ.',
        
        ];
    }
}
