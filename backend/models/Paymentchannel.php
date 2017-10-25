<?php
namespace backend\models;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class Paymentchannel extends \common\models\PaymentChannel
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
 public static function getPaymentName($id){
    $model = PaymentChannel::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->name:'';
 }
 public static function getPaymentTypeId($id){
    $model = PaymentChannel::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->type_id:0;
 }
}
