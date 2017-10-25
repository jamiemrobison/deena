<?php
use yii\helpers\Html;
use yii\web\UrlManager;
use yii\helpers\BaseUrl;

/* @var $this \yii\web\View */
/* @var $content string */
Yii::$app->name = 'Gate Tracker';

use backend\models\Notification;
use yii\web\Session;
use yii\helpers\Url;


$session = new Session();
$session->open();

// $noti = Notification::find()->where(['!=','status',1])->all();
// $img_logo = $directoryAsset.'/img/blue.png';


?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">DIN</span><span class="logo-lg">'.Html::img('@web/uploads/logo/DEENA_LOGO.png',['style'=>'width: 50%;']).'</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <?php //if($session['roleid'] ==1):?>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning cnt-noti"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"> <i class="fa fa-bell"></i> ข่าวสาร</li>
                        <li class="noti-msg-list">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                              <?php if(1>6):?>
                                <li>
                                    <a href="index.php?r=notification/index">
                                        <i class="fa fa-car text-green"></i> <span class="noti-message"> </span><span class="label label-success"> <small class="cnt-msg"></small></span>
                                    </a>
                                </li>
                              <?php endif;?>
                            </ul>
                        </li>
                        <!-- <li class="footer"><a href="#">View all</a></li> -->
                    </ul>
                </li>
              <?php //endif;?>
              <?php if($session['roleid'] ==2):?>
              <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning cnt-noti"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header"><i class="fa fa-bell"></i> แจ้งเตือน</li>
                      <li class="noti-msg-list">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                              <?php if(1>0):?>
                                <li>
                                    <a href="index.php?r=notification/showlist">
                                        <i class="fa fa-car text-green"></i> <span class="noti-message">แจ้งผลการอนุมัติ </span><span class="label label-success"> <small class="cnt-msg"></small></span>
                                    </a>
                                </li>
                              <?php endif;?>
                            </ul>
                        </li>
                      <!-- <li class="footer"><a href="#">View all</a></li> -->
                  </ul>
              </li>
            <?php endif;?>
                <!-- Tasks: style can be found in dropdown.less -->
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php echo $session['username'];?>
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="index.php?r=changepwd/index" class="btn btn-default btn-flat">เปลี่ยนรหัสผ่าน</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'ออกจากระบบ',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
