<?php
namespace backend\models;
use yii\db\ActiveRecord;

date_default_timezone_set('Asia/Bangkok');
class Package extends \common\models\ProductPackage
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
 public function getCompanyinfo(){
    return $this->hasOne(\backend\models\Insurancecompany::className(),['id'=>'company_insure']);
 }
 public function getProductinfo(){
    return $this->hasOne(\backend\models\Product::className(),['id'=>'insure_type']);
 }
 public function getCarold($id){
    $model = \backend\models\Packagecondition::find()->where(['package_id'=>$id,'title_id'=>1])->one();
    return count($model)>0?$model->condition_text:'';
 }
 public function getPhoto($id){
    $model = \backend\models\Packagecondition::find()->where(['package_id'=>$id,'title_id'=>2])->one();
    return count($model)>0?$model->condition_text:'';
 }
 
}
