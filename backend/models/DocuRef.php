<?php
namespace backend\models;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class DocuRef extends \common\models\DocuRef
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
    public static function getFileOwner($type,$id){
        if($type == 2){ //company
            $model = \backend\models\Insurancecompany::find()->where(['id'=>$id])->one();
            return count($model)>0?$model->short_name:'';
        }elseif($type == 3){ //member
            $model = \backend\models\Member::find()->where(['id'=>$id])->one();
            return count($model)>0?$model->first_name." ".$model->last_name:'';
        }
    }

}
