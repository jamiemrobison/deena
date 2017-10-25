<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller {

  public function actionInit(){
      $auth = Yii::$app->authManager;
	  $auth->removeAll();
	  Console::output('Removing All! RBAC.....');

	  $admin = $auth->createRole('Admin');
	  $admin->description = 'ผู้ดูและระบบ';
	  $auth->add($admin);

	  $employee = $auth->createRole('Employee');
	  $employee->description = 'พนักงาน';
	  $auth->add($employee);

	  $supervisor = $auth->createRole('Supervisor');
	  $supervisor->description = 'หัวหน้าพนักงาน';
	  $auth->add($supervisor);

	  $manager = $auth->createRole('Manager');
	  $manager->description = 'ผู้จัดการ';
	  $auth->add($manager);


	  $auth->addChild($supervisor, $employee);
	  $auth->addChild($manager, $supervisor);
	  $auth->addChild($admin, $manager);

	  // $author = $auth->createRole('Author');
	  // $author->description = 'สำหรับการเขียนบทความ';
	  // $auth->add($author);

	  // $management = $auth->createRole('Management');
	  // $management->description = 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ';
	  // $auth->add($management);

	  // $admin = $auth->createRole('Admin');
	  // $admin->description = 'สำหรับการดูแลระบบ';
	  // $auth->add($admin);

	    // เรียกใช้งาน AuthorRule
     // 	$rule = new \common\rbac\AuthorRule;
	    // $auth->add($rule);

	    // // สร้าง permission ขึ้นมาใหม่เพื่อเอาไว้ตรวจสอบและนำ AuthorRule มาใช้งานกับ updateOwnPost
	    // $updateOwnPost = $auth->createPermission('updateOwnPost');
	    // $updateOwnPost->description = 'Update Own Post';
	    // $updateOwnPost->ruleName = $rule->name;
	    // $auth->add($updateOwnPost);

	    // $updatePost = $auth->createPermission('updateBlog');
     //    $updatePost->description = 'Update application';
     //    $auth->add($updatePost);

	    // $auth->addChild($author,$createPost);

	    // // เปลี่ยนลำดับ โดยใช้ updatePost อยู่ภายใต้ updateOwnPost และ updateOwnPost อยู่ภายใต้ author อีกที
	    // $auth->addChild($updateOwnPost, $updatePost);
	    // $auth->addChild($author, $updateOwnPost);	

	  // $auth->addChild($management, $manageUser);
	  // $auth->addChild($management, $author);
	  // $auth->addChild($admin, $management);

	  $auth->assign($admin, 1);
	  $auth->assign($manager, 2);
	 // $auth->assign($author, 3);

	   Console::output('Success! RBAC roles has been added.');
	  }

}
?>