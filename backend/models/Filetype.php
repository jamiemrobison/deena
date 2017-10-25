<?php
namespace backend\models;
use yii\db\ActiveRecord;

date_default_timezone_set('Asia/Bangkok');
class Filetype extends \common\models\Filetype
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
 public static function getFileTypeName($id){
    $model = Filetype::find()->where(['id'=>$id])->one();
    return count($model)>0?$model->name:'';
 }

}
