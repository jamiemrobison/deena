<?php
namespace backend\models;
use Yii;
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
 public static function checkRoleEnable($menu){
   $user_roleid = Yii::$app->user->identity->role_id;
   $data = [];
   $model_menu = \backend\models\Menu::find()->where(['controller'=>$menu])->one();
  
   if($model_menu){
       $model = \backend\models\Permission::find()->where(['role_id'=>$user_roleid,'menu_id'=>$model_menu->id])->one();
       if($model){
          array_push($data,['full'=>$model->is_full,'create'=>$model->is_create,'view'=>$model->is_view,'modified'=>$model->is_update,'delete'=>$model->is_delete]);
          if(count($data)>0){
            return $data;
          }else{
            array_push($data,['full'=>0,'create'=>0,'view'=>0,'modified'=>0,'delete'=>0]);
            return $data;
          }
       }
   }else{
          array_push($data,['full'=>0,'create'=>0,'view'=>0,'modified'=>0,'delete'=>0]);
          return $data;
   }
   
 }
}
