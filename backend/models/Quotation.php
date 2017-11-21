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
 public function getCapitalRate($quotation_id,$lineid){
    
    $rate = 0;
    //return $quotation_id.' - '.$lineid;
    $modelqo = \backend\models\Quotation::find()->where(['id'=>$quotation_id])->one();
    $model = \backend\models\Quotationdetail::find()->where(['id'=>$lineid])->one();
    
    if($model && $modelqo){
      $compid = self::findCompany($model->package_id);
      $brand = strtoupper(self::findBrand($modelqo->car_brand)) ;
      $modelcar = strtoupper(self::findModelName($modelqo->car_model)) ;
      $yearname = \backend\models\Caryear::getCaryearName($modelqo->car_year);
      $yearcount = (int)date("Y") - (int)$yearname;

      $cap_year = date("Y");

      if($compid >0){
          $capyear = \common\models\CapitalYear::find()->where(['insure_company_id'=>$compid,'cap_year'=>$cap_year])->one();
          if($capyear){ //return $cap_year;
            $capcar =\common\models\VCapital::find()->where(['cap_year'=>$cap_year,'brand_name'=>$brand,'model_name'=>$modelcar,'year_count'=>$yearcount])->one();
            if($capcar){
             // return 9090;
              $max = $capcar->max;
              $rate = $max - 20000;
            }
          }
      }
    }
    return $rate;
 }
 public function findCompany($id){
  $model = \backend\models\Package::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->company_insure:0;
 }
  public function findBrand($id){
  $model = \backend\models\Carbrand::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->name:'';
 }
  public function findModelName($id){
  $model = \backend\models\Carinfo::find()->where(['id'=>$id])->one();
  return count($model)>0?$model->model:'';
 }
}
