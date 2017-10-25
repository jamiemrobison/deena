<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class Modelfile extends Model
{
    /**
     * @inheritdoc
     */
   public $file,$filecategory;
    public function rules()
    {
        return [
            [['file'],'string'],
            [['filecategory'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file' => 'ไฟล์แนบ',
           'filecategory' => 'ชื่อกลุ่มไฟล์',
        ];
    }
}
