<?php
namespace backend\models;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class Product extends \common\models\Product
{
  public function behaviors()
{
    return [
        'timestampcdate'=>[
            'class'=> \yii\behaviors\AttributeBehavior::className(),
            'attributes'=>[
            ActiveRecord::EVENT_BEFORE_INSERT=>'created_at',
            ],
            'value'=> time(),
        ],
        'timestampudate'=>[
            'class'=> \yii\behaviors\AttributeBehavior::className(),
            'attributes'=>[
            ActiveRecord::EVENT_BEFORE_INSERT=>'updated_at',
            ],
          'value'=> time(),
        ],
        'timestampupdate'=>[
            'class'=> \yii\behaviors\AttributeBehavior::className(),
            'attributes'=>[
            ActiveRecord::EVENT_BEFORE_UPDATE=>'updated_at',
            ],
            'value'=> time(),
        ],
    ];
 }
 public function getUnit(){
    return $this->hasOne(\common\models\Unit::className(),['id'=>'unit_id']);
 }
 public function getCategory(){
    return $this->hasOne(\backend\models\Category::className(),['id'=>'category_id']);
 }
 public function getProdname($id){
    $model = Product::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->name:'';
 }
 public function getProdcode($id){
    $model = Product::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->product_code:'';
 }
 
}
