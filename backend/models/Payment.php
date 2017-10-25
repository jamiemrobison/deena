<?php
namespace backend\models;
use yii\db\ActiveRecord;

date_default_timezone_set('Asia/Bangkok');
class Payment extends \common\models\InsurePayment
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
    $model = Payment::find()->MAX('payment_code');
    if($model){
      $prefix = "R".substr(date("Y"),2,2);
      $cnum = substr((string)$model,3,strlen($model));
      $len = strlen($cnum);
      $clen = strlen($cnum + 1);
      $loop = $len - $clen;
      for($i=1;$i<=$loop;$i++){
        $prefix.="0";
      }
      $prefix.=$cnum + 1;
      return $prefix;
    }else{
        $prefix ="R".substr(date("Y"),2,2);
        return $prefix.'000000001';
    }
}
 public static function getPrice($id){
  $model = \backend\models\Insurance::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->grand_total:0;
 }
}
