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
            $menuid = [];
            $submenuid = [];
            if($user_roleid){
                $aut_menu = \backend\models\Permission::find()->where(['role_id'=>$user_roleid,'menu_type_id'=>1,'is_view'=>1])->all();
                if($aut_menu){
                    foreach ($aut_menu as $value) {
                       array_push($menuid, $value->menu_id);
                    }
                }
                $aut_sub_menu = \backend\models\Permission::find()->where(['role_id'=>$user_roleid,'menu_type_id'=>2,'is_view'=>1])->all();
                if($aut_sub_menu){
                    foreach ($aut_sub_menu as $value) {
                       array_push($submenuid, $value->menu_id);
                    }
                }
            }else{
                $aut_menu = \backend\models\Permission::find()->all();
                if($aut_menu){
                    foreach ($aut_menu as $value) {
                       array_push($menuid, $value->menu_id);
                    }
                }
                $aut_sub_menu = \backend\models\Permission::find()->all();
                if($aut_sub_menu){
                    foreach ($aut_sub_menu as $value) {
                       array_push($submenuid, $value->menu_id);
                    }
                }
            } 
            //echo count($menuid);
            $menulist = \backend\models\Menu::find()->where(['IS','parent_id',null])->andFilterWhere(['id'=>$menuid])->orderby(['number'=>SORT_ASC])->all();
            $menu_item = [];
            if(count($menulist)>0){
                // $menu_item = [
                //             'label'=>'test',
                //             'icon' => 'cog',
                //             'url' => "#",
                //           ];
                foreach ($menulist as $value) {
                     $sub_menu = [];
                     $model_sub = \backend\models\Menu::find()->where(['parent_id'=>$value->id])->andFilterWhere(['id'=>$submenuid])->orderby(['sub_number'=>SORT_DESC])->all();
                     if(count($model_sub)>0){
                        foreach ($model_sub as $data_sub) {
                           $sub_menu[] = [
                            'label'=>$data_sub->name,
                            'icon' => $data_sub->icon,
                            'url' => $data_sub->url == null?'':['/'.$data_sub->url],
                            'items' => [],
                          ];
                        }
                        
                     }
                     $menu_item[] = [
                            'label'=>$value->name,
                            'icon' => $value->icon,
                            'url' => $value->url == null?'':['/'.$value->url],
                            'items' => $sub_menu,
                          ];
                         
                }                   
            }
            
           // echo count($menulist);

            // $role_array = \backend\models\Userrole::checkRoleEnable($user_roleid,3);
            // if(count($role_array)>0){
            //     if($role_array[0]['full'] == 1 || $role_array[0]['view'] == 1){
                    // $setting_menu = [
                    //     'label' => 'ตั้งค่าระบบ',
                    //     'icon' => 'cog',
                    //     'url' => "#",
                    //     'items' => [
                    //         ['label' => 'คำนำหน้า', 'icon' => 'file-code-o', 'url' => ['/prefixname'],],
                    //         ['label' => 'ประเภทไฟล์แนบ', 'icon' => 'folder-open', 'url' => ['/filetype'],],
                    //         ['label' => 'ช่องทางชำระเงิน', 'icon' => 'cc-mastercard', 'url' => ['/paymentchannel'],],
                    //         //['label' => 'สิทธิ์การใช้งาน', 'icon' => 'registered', 'url' => ['/userrole'],],
                    //       //  ['label' => 'กำหนดสิทธิ์การใช้งาน', 'icon' => 'cube', 'url' => ['/assignrole'],],
                    //     ],
                    // ];
            $x = '';
            if(1>0){
                $x= [

                        [ 'label'=>'test',
                         'icon' => 'cog',
                        'url' => "#",
                        ]

                 ];
            }
        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menu_item
           ]);
         ?>
    
       

    </section>

</aside>
