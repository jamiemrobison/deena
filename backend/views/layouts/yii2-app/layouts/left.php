<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
              <?php use yii\web\Session;

              $session = new Session();
              $session->open(); ?>
                <p><?php echo $session['username'];?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
       <?php if(1 == 1):?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    //['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าแรก','icon'=>'dashboard', 'url' => ['/dashboard']],
                    ['label' => 'ตั้งค่าร้าน','icon'=>'cogs', 'url' => ['/shop']],
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
                        'label' => 'พนักงาน',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ตำแหน่ง', 'icon' => 'file-code-o', 'url' => ['/position'],],
                            ['label' => 'พนักงาน', 'icon' => 'user', 'url' => ['/employee'],],
                            ['label' => 'สมาชิก', 'icon' => 'user', 'url' => ['/member'],],
                           // ['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                          //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                        ],
                    ],  
                    ['label' => 'ธนาคาร', 'icon'=>'university' ,'url' => ['bank/index']],
                    ['label' => 'บริษัทประกัน', 'icon'=>'university' ,'url' => ['insurancecompany/index']],
                   // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                   
                    [
                        'label' => 'ผลิตภัณฑ์',
                        'icon' => 'cubes',
                        'url' => '#',
                        'items' => [
                            ['label' => 'กลุ่มผลิตภัณฑ์', 'icon' => 'file-code-o', 'url' => ['/category'],],
                            ['label' => 'แฟ้มผลิตภัณฑ์', 'icon' => 'cube', 'url' => ['/product'],],
                            //['label' => 'หน่วยนับ', 'icon' => 'magnet', 'url' => ['/unit'],],
                        ],
                    ],
            
                    
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
        ) ?>
    <?php elseif($session['groupid']==2 && $session['roleaction']==1):?>
            <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    //['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าแรก','icon'=>'dashboard', 'url' => ['/dashboard']],
                  //  ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'ผลิตภัณฑ์',
                        'icon' => 'cubes',
                        'url' => '#',
                        'items' => [
                            ['label' => 'กลุ่มผลิตภัณฑ์', 'icon' => 'file-code-o', 'url' => ['/category'],],
                            ['label' => 'แฟ้มผลิตภัณฑ์', 'icon' => 'cube', 'url' => ['/product'],],
                            //['label' => 'หน่วยนับ', 'icon' => 'magnet', 'url' => ['/unit'],],
                        ],
                    ],
                    [
                        'label' => 'บันทึกรายการประจำวัน',
                        'icon' => 'retweet',
                        'url' => '#',
                        'items' => [
                          ['label' => 'ประเภทการติดต่อ', 'icon' => 'filter', 'url' => ['/contacttype'],],
                          ['label' => 'ประเภทรถ', 'icon' => 'truck', 'url' => ['/cartype'],],
                        //  ['label' => 'แจ้งรถเข้า', 'icon' => 'arrow-right', 'url' => ['/journal/journalin'],],
                          ['label' => 'แจ้งรถเข้า - ออก', 'icon' => 'random', 'url' => ['/journal'],],
                          ['label' => 'รับสินค้า', 'icon' => 'edit', 'url' => ['/transaction'],],
                          ['label' => 'รายการแจ้งเตือน', 'icon' => 'bell', 'url' => ['/notification'],],
                      ],
                    ],
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
        ) ?>
    <?php else:?>

        <?= dmstr\widgets\Menu::widget(
            // [
            //     'options' => ['class' => 'sidebar-menu'],
            //     'items' => [
            //         //['label' => '', 'options' => ['class' => 'header']],
            //         [
            //             'label' => 'บันทึกรายการประจำวัน',
            //             'icon' => 'retweet',
            //             'url' => '#',
            //             'items' => [
            //               // ['label' => 'ประเภทการติดต่อ', 'icon' => 'filter', 'url' => ['/contacttype'],],
            //               // ['label' => 'ประเภทรถ', 'icon' => 'truck', 'url' => ['/cartype'],],
            //             //  ['label' => 'แจ้งรถเข้า', 'icon' => 'arrow-right', 'url' => ['/journal/journalin'],],
            //               ['label' => 'แจ้งรถเข้า - ออก', 'icon' => 'random', 'url' => ['/journal'],],
            //                ['label' => 'รายการแจ้งเตือน', 'icon' => 'random', 'url' => ['/notification/showlist'],],
            //           ],
            //         ],
                    
            //     ],
            // ]
        ) ?>

    <?php endif;?>

    </section>

</aside>
