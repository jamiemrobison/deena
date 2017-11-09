<?php
namespace backend\models;
use yii\db\ActiveRecord;
date_default_timezone_set('Asia/Bangkok');

class Member extends \common\models\Member
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
 public function getLevelinfo(){
    return $this->hasOne(\common\models\Memberlevel::className(),['id'=>'level_id']);
 }
 public static function getLastNo(){
    $model = Member::find()->MAX('member_code');
    if($model){
      $prefix ="M";
      $cnum = substr((string)$model,1,strlen($model));
      $len = strlen($cnum);
      $clen = strlen($cnum + 1);
      $loop = $len - $clen;
      for($i=1;$i<=$loop;$i++){
        $prefix.="0";
      }
      $prefix.=$cnum + 1;
      return $prefix;
    }else{
        $prefix ="M";
        return $prefix.'000000001';
    }
}

}
