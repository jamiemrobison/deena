<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Deena</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
               <!--  <div class="profile">
                    <div class="profile_pic">
                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>Administrator</h2>
                    </div>
                </div> -->
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>เมนู</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    //['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าแรก','icon'=>'dashboard', 'url' => ['/dashboard']],
                    ['label' => 'ตั้งค่าร้าน','icon'=>'cogs', 'url' => ['/shop']],
                  [
                        'label' => 'ตั้งค่าระบบ',
                        'icon' => 'cog',
                        'url' => "#",
                        'items' => [
                            ['label' => 'คำนำหน้า', 'icon' => 'file-code-o', 'url' => ['/prefixname'],],
                            ['label' => 'ประเภทไฟล์แนบ', 'icon' => 'folder-open', 'url' => ['/filetype'],],
                            ['label' => 'ช่องทางชำระเงิน', 'icon' => 'cc-mastercard', 'url' => ['/paymentchannel'],],
                            //['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                          //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                        ],
                    ], 
                    [
                        'label' => 'ผู้ใช้งาน',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'กลุ่มผู้ใช้งาน', 'icon' => 'file-code-o', 'url' => ['/usergroup'],],
                            ['label' => 'แฟ้มผู้ใช้งาน', 'icon' => 'user', 'url' => ['/user'],],
                            ['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                          //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                        ],
                    ], 
                    [
                        'label' => 'ระบบข่าว',
                        'icon' => 'comments',
                        'url' => '#',
                        'items' => [
                            ['label' => 'หมวดข่าว', 'icon' => 'commenting', 'url' => ['/newscategory'],],
                            ['label' => 'ข่าว', 'icon' => 'comment', 'url' => ['/news'],],
                          
                        ],
                    ], 
                     [
                        'label' => 'พนักงาน',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                           
                            ['label' => 'ตำแหน่ง', 'icon' => 'file-code-o', 'url' => ['/position'],],
                            ['label' => 'พนักงาน', 'icon' => 'user', 'url' => ['/employee'],],
                            ['label' => 'สมาชิก', 'icon' => 'user-plus', 'url' => ['/member'],],
                           // ['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                          //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                        ],
                    ],  
                     [
                        'label' => 'แผนการตลาด',
                        'icon' => 'info',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ระดับสมาชิก', 'icon' => 'navicon', 'url' => ['/memberlevel'],],
                            ['label' => 'สายงาน', 'icon' => 'user-plus', 'url' => ['/line'],],
                            ['label' => 'ค่าแนะนำ', 'icon' => 'registered', 'url' => ['/introduce'],],
                            ['label' => 'ประเภทโปรโมชั่น', 'icon' => 'gg', 'url' => ['/promotiontype'],],
                            ['label' => 'โปรโมชั่น', 'icon' => 'gift', 'url' => ['/promotion'],],
                          //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                        ],
                    ],  
                    ['label' => 'ธนาคาร', 'icon'=>'money' ,'url' => ['bank/index']],
                    [
                        'label' => 'การเงิน/การบัญชี',
                        'icon' => 'gbp',
                        'url' => '#',
                        'items' => [
                            ['label' => 'การรับชำระเงิน', 'icon' => 'dollar', 'url' => ['/payment'],],
                            ['label' => 'การตัดจ่าย', 'icon' => 'cc-visa', 'url' => ['/'],],
                        ],
                    ],  
                    ['label' => 'บริษัทประกัน', 'icon'=>'university' ,'url' => ['insurancecompany/index']],
                   // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                   
                    [
                        'label' => 'แฟ้มข้อมูลรถ',
                        'icon' => 'car',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ยี่ห้อรถ', 'icon' => 'bold', 'url' => ['/carbrand'],],
                            ['label' => 'ปีรถ', 'icon' => 'yc', 'url' => ['/caryear'],],
                            ['label' => 'รถ', 'icon' => 'car', 'url' => ['/carinfo'],],
                            ['label' => 'รหัสรถ', 'icon' => 'retweet', 'url' => ['/car'],],
                            ['label' => 'ประเภทรถ', 'icon' => 'magnet', 'url' => ['/cartype'],],
                        ],
                    ],
                    [
                        'label' => 'ผลิตภัณฑ์',
                        'icon' => 'cubes',
                        'url' => '#',
                        'items' => [
                            ['label' => 'กลุ่มผลิตภัณฑ์', 'icon' => 'folder-o', 'url' => ['/category'],],
                            ['label' => 'กลุ่มย่อย', 'icon' => 'folder-open', 'url' => ['/subcategory'],],
                            ['label' => 'ความคุ้มครอง', 'icon' => 'object-ungroup', 'url' => ['/actprotect'],],
                            ['label' => 'แฟ้มผลิตภัณฑ์', 'icon' => 'cube', 'url' => ['/product'],],
                            ['label' => 'Package ผลิตภัณฑ์', 'icon' => 'get-pocket', 'url' => ['/package'],],
                            ['label' => 'ราคาแพ็กเก็จ', 'icon' => 'money', 'url' => ['/productprice'],],
                        ],
                    ],
                     [
                        'label' => 'ทำรายการ',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ใบเสนอราคา', 'icon' => 'send-o', 'url' => ['/quotation'],],
                            ['label' => 'แจ้งประกันใหม่', 'icon' => 'folder-o', 'url' => ['/insurance'],],
                            ['label' => 'อัตราเบี้ยประกันภัย พรบ.', 'icon' => 'money', 'url' => ['/act'],],
                            ['label' => 'เช็คเบี้ยประกัน', 'icon' => 'edit', 'url' => ['/checkinsure'],],
                            ['label' => 'ชำระเงิน', 'icon' => 'money', 'url' => ['/payment'],],
                            // ['label' => 'Package ผลิตภัณฑ์', 'icon' => 'get-pocket', 'url' => ['/package'],],
                            //['label' => 'หน่วยนับ', 'icon' => 'magnet', 'url' => ['/unit'],],
                        ],
                    ],
                     ['label' => 'เอกสารแนบ', 'icon'=>'files-o' ,'url' => ['docuref/index']],
                    
                    // [
                    //     'label' => 'บันทึกรายการประจำวัน',
                    //     'icon' => 'retweet',
                    //     'url' => '#',
                    //     'items' => [
                    //       ['label' => 'ประเภทการติดต่อ', 'icon' => 'filter', 'url' => ['/contacttype'],],
                    //       ['label' => 'ประเภทรถ', 'icon' => 'truck', 'url' => ['/cartype'],],
                    //     //  ['label' => 'แจ้งรถเข้า', 'icon' => 'arrow-right', 'url' => ['/journal/journalin'],],
                    //       ['label' => 'แจ้งรถเข้า - ออก', 'icon' => 'random', 'url' => ['/journal'],],
                    //       ['label' => 'รับสินค้า', 'icon' => 'edit', 'url' => ['/transaction'],],
                    //       ['label' => 'รายการแจ้งเตือน', 'icon' => 'bell', 'url' => ['/notification'],],
                    //   ],
                    // ],
                    [
                        'label' => 'รายงาน',
                        'icon' => 'pie-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Report1', 'icon' => 'bar-chart', 'url' => ['/gii'],],
                            ['label' => 'Report2', 'icon' => 'bar-chart', 'url' => ['/debug'],],
                            ['label' => 'Report3', 'icon' => 'bar-chart', 'url' => ['/debug'],],
                            ['label' => 'Report4', 'icon' => 'bar-chart', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="/">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
               @2017 <a href="#" rel="nofollow" target="_blank">Deena</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
