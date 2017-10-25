<?php
namespace backend\models;
use yii\db\ActiveRecord;

date_default_timezone_set('Asia/Bangkok');
class Userrole extends \common\models\UserRole
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
 public function checkRoleEnable($id,$menu_id){
   $model = \backend\models\Permission::find()->where(['role_id'=>$id,'menu_id'=>$menu_id])->one();
   $data = [];
   if($model){
      array_push($data,['full'=>$model->is_full,'view'=>$model->is_view,'modified'=>$model->is_update,'delete'=>$model->is_delete]);
      if(count($data)>0){
        return $data;
      }
   }
 }
}
