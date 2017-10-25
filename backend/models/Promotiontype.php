<?php
namespace backend\models;
use yii\db\ActiveRecord;

date_default_timezone_set('Asia/Bangkok');
class Promotiontype extends \common\models\Promotiontype
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
 // public static function getCarcode($id){
 //    $model = Car::find()->where(['id'=>$id])->one();
 //    return count($model)>0?$model->car_code:'';
 // }
 // public static function getCarActcode($id){
 //    $model = Car::find()->where(['id'=>$id])->one();
 //    return count($model)>0?$model->act_code:'';
 // }
}
