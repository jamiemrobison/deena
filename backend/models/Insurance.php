<?php
namespace backend\models;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class Insurance extends \common\models\InsuranceTable
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

 public static function getLastNo(){
    $model = Insurance::find()->MAX('insure_code');
    if($model){
      $prefix = substr(date("Y"),2,2);
      $cnum = substr((string)$model,2,strlen($model));
      $len = strlen($cnum);
      $clen = strlen($cnum + 1);
      $loop = $len - $clen;
      for($i=1;$i<=$loop;$i++){
        $prefix.="0";
      }
      $prefix.=$cnum + 1;
      return $prefix;
    }else{
        $prefix =substr(date("Y"),2,2);
        return $prefix.'000000001';
    }
}
public function getInsurecompany($id){
  $model = \backend\models\Insurancecompany::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->name:'';
}
public function getProduct($id){
  $model = \backend\models\Product::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->product_code:'';
}
public function getInsuretype($id){
  $model = \backend\models\Category::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->name:'';
}
public function getInsureno($id){
  $model = \backend\models\Insurance::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->insure_code:'';
}
public function getPaymentsum($id){
  $model = \backend\models\Payment::find()->where(['insure_no'=>$id])->sum('amount');
  return $model;
  // return count($model)>0?$model->insure_code:'';
}
public static function getPlateinfo($id,$type){
  $model = \backend\models\Insurance::find()->where(['id'=>$id])->one();
  if($type == 1){
      return count($model)>0?$model->plate_category:'';
    }else  if($type == 2){
      return count($model)>0?$model->plate_license:'';
  }else  if($type == 3){
      $model_prov = \common\models\Province::find()->where(['PROVINCE_ID'=>$model->plate_province])->one();
      return count($model_prov)>0? $model_prov->PROVINCE_NAME:'';
  }

}
public static function getDistrictName($id){
  $model = \common\models\District::find()->where(['DISTRICT_ID'=>$id])->one();
  return count($model)>0? $model->DISTRICT_NAME:'';
}
public static function getCityName($id){
  $model = \common\models\Amphur::find()->where(['AMPHUR_ID'=>$id])->one();
  return count($model)>0? $model->AMPHUR_NAME:'';
}
public static function getProvinceName($id){
  $model = \common\models\Province::find()->where(['PROVINCE_ID'=>$id])->one();
  return count($model)>0? $model->PROVINCE_NAME:'';
}
}
