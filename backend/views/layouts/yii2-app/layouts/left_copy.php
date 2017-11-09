<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username;?></p>
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

        <?php
            $user_roleid = Yii::$app->user->identity->role_id;
            $dashboard_menu = '';
            $setting_menu = '';
            $user_menu = '';

            // $role_array = \backend\models\Userrole::checkRoleEnable($user_roleid,3);
            // if(count($role_array)>0){
            //     if($role_array[0]['full'] == 1 || $role_array[0]['view'] == 1){
                    $setting_menu = [
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
                    ];
            //     }
            // }
             $role_array = \backend\models\Userrole::checkRoleEnable($user_roleid,2);
            // if(count($role_array)>0){
            //     if($role_array[0]['full'] == 1 || $role_array[0]['view'] == 10){
                    $user_menu = [
                        'label' => 'ผู้ใช้งาน',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'กลุ่มผู้ใช้งาน', 'icon' => 'file-code-o', 'url' => ['/usergroup'],],
                            ['label' => 'แฟ้มผู้ใช้งาน', 'icon' => 'user', 'url' => ['/user'],],
                            ['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                          //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                        ],
                    ];
            //     }
            // }
         ?>
    
       <?php if(1 == 1):?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    //['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าแรก','icon'=>'dashboard', 'url' => ['/dashboard']],
                    ['label' => 'ตั้งค่าร้าน','icon'=>'cogs', 'url' => ['/shop']],
                    $setting_menu
                    , 
                    $user_menu
                    // [
                    //     'label' => 'ผู้ใช้งาน',
                    //     'icon' => 'users',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'กลุ่มผู้ใช้งาน', 'icon' => 'file-code-o', 'url' => ['/usergroup'],],
                    //         ['label' => 'แฟ้มผู้ใช้งาน', 'icon' => 'user', 'url' => ['/user'],],
                    //         ['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                    //       //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                    //     ],
                    // ], 
                    ,
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
                        //'url' => '#',
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
        ) ?>
    <?php elseif($session['groupid']==2 && $session['roleaction']==1):?>
            <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
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
