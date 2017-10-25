<?php
namespace backend\models;
use yii\helpers\ArrayHelper;


class User extends \common\models\User
{
	public $password;

public function rules(){
	return ArrayHelper::merge(parent::Rules(),[
		[['password','username'],'string'],
    [['email'],'email'],
		]);
}

  public function getUsergroup(){
    return $this->hasOne(\backend\models\Usergroup::className(),['id'=>'group_id']);
  }
  public function getUserrole(){
    return $this->hasOne(\backend\models\Userrole::className(),['id'=>'role_id']);
  }
  public function getGroup(){
    return $this->hasOne(\backend\models\Usergroup::className(),['id'=>'group_id']);
  }
}
