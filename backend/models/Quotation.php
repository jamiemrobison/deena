<?php
namespace backend\models;
use yii\db\ActiveRecord;

date_default_timezone_set('Asia/Bangkok');
class Quotation extends \common\models\Quotation
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
    $model = Quotation::find()->MAX('quotation_no');
    if($model){
      $prefix = "Q".substr(date("Y"),2,2);
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
        $prefix ="Q".substr(date("Y"),2,2);
        return $prefix.'000001';
    }
}
 public function getQuotationNo($id){
  $model = Quotation::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->quotation_no:'';
 }
}
