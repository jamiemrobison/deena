<?php
namespace backend\models;

class User extends \common\models\User
{
  public function getUsergroup(){
    return $this->hasOne(\backend\models\Usergroup::className(),['id'=>'group_id']);
  }
  public function getUserrole(){
    return $this->hasOne(\backend\models\Userrole::className(),['id'=>'role_id']);
  }
}
