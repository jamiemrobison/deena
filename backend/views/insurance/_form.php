<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

use backend\models\Insurancecompany;
use backend\models\Category;
use backend\models\Product;
use backend\models\Carbrand;
use backend\models\Member;
use backend\models\Car;
use backend\models\Caryear;
use backend\models\Carinfo;
use backend\models\Act;
use common\models\Province;
use common\models\Amphur;
use common\models\District;
use kartik\file\FileInput;
use yii\helpers\Url;
use backend\models\Promotion;
use lavrentiev\widgets\toastr\Notification;
use backend\helpers\ProtectTitle;
use backend\helpers\ConditionTitle;
/* @var $this yii\web\View */
/* @var $model backend\models\Insurance */
/* @var $form yii\widgets\ActiveForm */

$insure_com = Insurancecompany::find()->where(['status'=> 1])->all();
$cat = Category::find()->where(['status'=> 1])->all();
$prod = Product::find()->where(['status'=> 1])->all();
$promotion = Promotion::find()->where(['status'=> 1])->all();
$brand = Carbrand::find()->where(['status'=> 1])->all();
$member = Member::find()->where(['status'=> 1])->all();
// $province = Province::find()->where(['status'=> 1])->all();
$car = Car::find()->where(['status'=> 1])->all();
$caryear = Caryear::find()->where(['status'=> 1])->all();
$carinfo = Carinfo::find()->where(['status'=> 1])->all();
$act = Act::find()->where(['status'=> 1])->all();
$prov = Province::find()->all();
$amp = Amphur::find()->all();
$dist = District::find()->all();

$prefix = \backend\models\Prefixname::find()->where(['status'=>1])->all();
//echo $model->protect_start_date;
//$pro_start = date("d-m-Y",$model->protect_start_date);
//echo date("d-m-Y",$model->protect_end_date);



?>

<div class="insurance-form">
  <?php $session = Yii::$app->session;
      if ($session->getFlash('msg')): ?>
       <!-- <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php //echo $session->getFlash('msg'); ?>
      </div> -->
        <?php echo Notification::widget([
            'type' => 'success',
            'title' => 'แจ้งผลการทำงาน',
            'message' => $session->getFlash('msg'),
            'options' => [
                "closeButton" => false,
                "debug" => false,
                "newestOnTop" => false,
                "progressBar" => false,
                "positionClass" => "toast-top-right",
                "preventDuplicates" => false,
                "onclick" => null,
                "showDuration" => "300",
                "hideDuration" => "1000",
                "timeOut" => "6000",
                "extendedTimeOut" => "1000",
                "showEasing" => "swing",
                "hideEasing" => "linear",
                "showMethod" => "fadeIn",
                "hideMethod" => "fadeOut"
            ]
        ]); ?> 
        <?php endif; 
  ?>

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
                        <?= Html::submitButton('<i class="fa fa-save"></i> บันทึก', ['class' => 'btn btn-success']) ?>
                        <?php if(!$model->isNewRecord):?>
                        <?= Html::button('<i class="fa fa-money"></i> ชำระเงิน', ['class' => 'btn btn-primary btn-payment']) ?>
                        <?= Html::button('<i class="fa fa-copy"></i> สร้าง พรบ.', ['class' => 'btn btn-default btn-copy-insure']) ?>
                        <?= Html::button('<i class="fa fa-bookmark"></i> ต่ออายุ', ['class' => 'btn btn-default btn-renew-insure']) ?>
                        <?= Html::button('<i class="fa fa-print"></i> พิมพ์ใบแจ้งงาน', ['class' => 'btn btn-default']) ?>
                      <?php endif;?>
                       <div class="pull-right">
                         <?php if($model->status == 1):?>
                              <div class="label label-default">รอชำระเงิน</div>
                          <?php elseif($model->status == 2):?>
                              <div class="label label-success">ชำระเงินแล้ว</div>
                         <?php endif;?>
                        </div>
        </div>

      </div>
     </div>
      
     <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลแจ้งประกัน</a></li>
              <li><a href="#tab_2" data-toggle="tab">สลักหลัง</a></li>
              <li><a href="#tab_7" data-toggle="tab">ความคุ้มครอง</a></li>
              <li id="tab_installment"><a href="#tab_6" data-toggle="tab">คำนวณผ่อนชำระ</a></li>
              <li><a href="#tab_3" data-toggle="tab">ประวัติชำระเงิน</a></li>
              <li><a href="#tab_4" data-toggle="tab">แนบไฟล์</a></li>
              <li><a href="#tab_5" data-toggle="tab">อื่นๆ</a></li>
              
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel">
                          <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                                  <?= $form->field($model, 'insure_code')->textInput(['maxlength' => true,'class'=>'form-control form-inline','readonly'=>'readonly','value'=>$model->isNewRecord?$runno:$model->insure_code])->label() ?>    
                                        </div>
                                         <div class="col-lg-3">
                                                  <?= $form->field($model, 'inform_code')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                                        </div>
                                        <div class="col-lg-3">
                                             <label for="insure_company_id">บริษัทประกัน</label>
                                             <select name="" class="form-control" onchange="alert();">
                                               <?php foreach($insure_com as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                             <?php //echo $form->field($model, 'insure_company_id')->widget(Select2::className(),
                                                    // [
                                                    //  'data'=> ArrayHelper::map($insure_com,'id','name'),
                                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_company_id',
                                                    //     'onchange'=>'
                                                    //             $.post("index.php?r=insurance/showproduct&id=' . '"+$(this).val(),function(data){
                                                    //               $("select#product_id").html(data);
                                                    //             });
                                                    //     '
                                                    // ],
                                                    // ]
                                                 // )->label() ?>
                                        </div>
                                         <div class="col-lg-3">
                                                  <label for="insure_company_id">กธ.ประเภท</label>
                                                   <select name=""  id="insure_type_id" class="form-control" onchange="alert();">
                                                     <?php foreach($cat as $value):?>
                                                     <option value="<?=$value->id?>"><?=$value->name;?></option>
                                                   <?php endforeach;?>
                                                   </select>
                                                  <?php //echo $form->field($model, 'insure_type_id')->widget(Select2::className(),
                                                    // [
                                                    //  'data'=> ArrayHelper::map($cat,'id','name'),
                                                    //  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_type_id',
                                                    //     'onchange'=>'
                                                    //         if($(this).val()==1){
                                                    //           $("#product_id").prop("disabled","");
                                                    //           $("#car_code").prop("disabled","");
                                                    //           $("#car_brand").prop("disabled","");
                                                    //             $.post("index.php?r=insurance/showcarcode&id=1",function(data){
                                                    //               $("select#car_code").html(data);
                                                    //             });
                                                    //         }else if($(this).val()==3){
                                                    //           $("#product_id").prop("disabled","disabled").empty();
                                                    //           $("#car_code").prop("disabled","");
                                                    //           $("#car_brand").prop("disabled","disabled");

                                                    //             $.post("index.php?r=insurance/showcarcode&id=2",function(data){
                                                    //               $("select#car_code").html(data);
                                                    //             });

                                                    //         }else{
                                                    //            $("#product_id").prop("disabled","disabled");
                                                    //           $("#car_code").prop("disabled","disabled").empty();
                                                    //           $("#car_brand").prop("disabled","disabled");

                                                    //         }
                                                            
                                                    //     '
                                                    //  ],

                                                    //]

                                                  //)->label() ?>    
                                        </div>
                                        
                                    </div>
                  
                    <div class="row">
                       <div class="col-lg-3">

                                            <label for="">ผลิตภัณฑ์</label>
                                             <select name="product_id" class="form-control" onchange="alert();">
                                               <?php foreach($prod as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                 <?php //echo $form->field($model, 'product_id')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($prod,'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'product_id','disabled'=>'disabled'],
                                    // ]

                                 // )->label() ?>      
                        </div> 
                        <div class="col-lg-3">
                                  <?= $form->field($model, 'insure_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'id_card')->textInput(['maxlength' => 13,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                         <div class="col-lg-3">
                                            <label for="">ผลิตภัณฑ์</label>
                                             <select name="prefix" class="form-control" onchange="alert();">
                                               <?php foreach($prefix as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                   <?php //echo $form->field($model, 'prefix')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($prefix,'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'prefix'],
                                    // ]

                                  //)->label() ?>   
                        </div>
                         
                    </div>
                    <div class="row">
                    
                      <div class="col-lg-3">
                        <?= $form->field($model, 'fname')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                      </div>
                      <div class="col-lg-3">
                        <?= $form->field($model, 'lname')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                                  <?= $form->field($model, 'address')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                        
                         <div class="col-lg-3">
                                     <label for="province">จังหวัด</label>
                                             <select name="" id="province" class="form-control" onchange="alert();">
                                               <?php foreach($prov as $value):?>
                                               <option value="<?=$value->PROVINCE_ID?>"><?=$value->PROVINCE_NAME;?></option>
                                             <?php endforeach;?>
                                      </select>
                                  <?php //echo $form->field($model, 'province')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($prov,'PROVINCE_ID','PROVINCE_NAME'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'province',
                                    //    'onchange'=>'
                                    //       $.post("index.php?r=insurance/showcity&id=' . '"+$(this).val(),function(data){
                                    //       $("select#city").html(data);
                                    //       $("select#city").prop("disabled","");

                                    //     });
                                    //    '
                                    // ],
                                    // ]

                                  //)->label() ?>
                        </div> 
                         <div class="col-lg-3">
                                      <label for="province">อำเภอ</label>
                                             <select name="" id="city" class="form-control" onchange="alert();">
                                               <?php foreach($amp as $value):?>
                                               <option value="<?=$value->AMPHUR_ID?>"><?=$value->AMPHUR_NAME;?></option>
                                             <?php endforeach;?>
                                      </select>
                                 <?php //echo $form->field($model, 'city')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($amp,'AMPHUR_ID','AMPHUR_NAME'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'city','disabled'=>'disabled',
                                    //       'onchange'=>'
                                    //       $.post("index.php?r=insurance/showdistrict&id=' . '"+$(this).val(),function(data){
                                    //       $("select#district").html(data);
                                    //       $("select#district").prop("disabled","");

                                    //     });

                                    //        $.post("index.php?r=member/showzipcode&id=' . '"+$(this).val(),function(data){
                                    //             $("#zipcode").val(data);
                                    //             $("#zipcode").prop("disabled","");

                                    //           });
                                    //    '
                                    // ],
                                    // 'pluginOptions'=>[
                                    //     'allowClear'=>true,
                                    //   ]
                                    // ]

                                  //)->label() ?>   
                        </div>
                         <div class="col-lg-3">
                                            <label for="">ตำบล</label>
                                             <select name="district" id="district" class="form-control" disabled="disabled" onchange="alert();">
                                               <?php foreach($dist as $value):?>
                                               <option value="<?=$value->DISTRICT_ID?>"><?=$value->DISTRICT_NAME;?></option>
                                             <?php endforeach;?>
                                             </select>
                            <?php //echo $form->field($model, 'district')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($dist,'DISTRICT_ID','DISTRICT_NAME'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'district','disabled'=>'disabled'],
                                    // ]

                                  //)->label() ?> 
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-lg-3">
                                  <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'zipcode'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div> 
                    </div>
                     <hr />
                    <div class="row">
                        <div class="col-lg-3">
                              <label for="">รหัสรถ</label>
                                             <select name="car_code" id="car_code" disabled="disabled" class="form-control" onchange="">
                                               <?php foreach($car as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->car_code." ".$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                  <?php //echo $form->field($model, 'car_code')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($car,'id',function($data){
                                    //       return $data->car_code." ".$data->name;
                                    //  }),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_code','disabled'=>'disabled',
                                    //     'onchange'=> '
                                    //         $.post("index.php?r=insurance/showcaract&id=' . '"+$(this).val(),function(data){
                                    //           var value = data.split(",");
                                    //           $("#car_usage").val(value[0]);
                                    //           $("#total").val(value[1]);
                                    //           $("#grand_total").val(value[2]);
                                    //         });
                                    //     '
                                    // ],
                                    // ]

                                  //)->label() ?>   
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'car_usage')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_usage'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                          <label for="">ยี่ห้อ</label>
                                             <select name="car_brand" id="car_brand" disabled="disabled" class="form-control" onchange="">
                                               <?php foreach($brand as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                             <?php //echo $form->field($model, 'car_brand')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($brand,'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_brand','disabled'=>'disabled',
                                    //     'onchange'=>'
                                    //           $.post("index.php?r=insurance/showmodel&id=' . '"+$(this).val(),function(data){
                                    //           $("select#car_model").html(data);
                                    //           $("select#car_model").prop("disabled","");
                                    //         });

                                            
                                    //     '
                                    //  ],
                                    // ]

                                  //)->label() ?>     
                        </div>
                         <div class="col-lg-3">
                          <label for="">รุ่น</label>
                                             <select name="plate_province" id="car_model" disabled="disabled" class="form-control" onchange="">
                                               <?php foreach($carinfo as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->model;?></option>
                                             <?php endforeach;?>
                                             </select>
                                  <?php //echo $form->field($model, 'car_model')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($carinfo,'id','model'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_model',
                                    //  'disabled'=>'disabled',
                                    // ],
                                    // ]

                                  //)->label() ?>   
                        </div>
                        <div class="col-lg-3">
                                           <label for="">ปีรถ</label>
                                             <select name="car_year" id="car_year" disabled="disabled" class="form-control" onchange="alert();">
                                               <?php foreach($caryear as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->year_text;?></option>
                                             <?php endforeach;?>
                                          </select>
                             <?php //echo $form->field($model, 'car_year')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($caryear,'id','year_text'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_year'],
                                    // ]

                                  //)->label() ?>  
                        </div>
                         <div class="col-lg-1">
                                  <?= $form->field($model, 'plate_category')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div> 
                           <div class="col-lg-2">
                                  <?= $form->field($model, 'plate_license')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div> 
                        <div class="col-lg-3">
                           <label for="">จังหวัด</label>
                                             <select name="plate_province" class="form-control" onchange="alert();">
                                               <?php foreach($prov as $value):?>
                                               <option value="<?=$value->PROVINCE_ID?>"><?=$value->PROVINCE_NAME;?></option>
                                             <?php endforeach;?>
                                             </select>
                            <?php //echo $form->field($model, 'plate_province')->widget(Select2::className(),
                                    // [
                                    // 'data'=> ArrayHelper::map($prov,'PROVINCE_ID','PROVINCE_NAME'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'plate_province'],
                                    // ]

                                  //)->label() ?>   
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'body_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'body_model')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                        
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'machine_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                        <div class="col-lg-1">
                                  <?= $form->field($model, 'seat')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                         <div class="col-lg-1">
                                  <?= $form->field($model, 'weight')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                         <div class="col-lg-1">
                                  <?= $form->field($model, 'cc')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>

                    </div>

                    <div class="row">
                       
                        
                         
                    </div>
                    <hr />
                     <div class="row">
                        <div class="col-lg-3">
                                   <?php
                                     if($model->isNewRecord){
                                        $model->protect_start_date=date("d-m-Y");
                                        $partofdate = explode('-', $model->protect_start_date);
                                        $model->protect_end_date = $partofdate[0]."-".$partofdate[1].'-'.intval($partofdate[2] + 1) ;
                                      }?>
                                       <?php if(!$model->isNewRecord){
                                        $model->protect_start_date = date("d-m-Y",$model->protect_start_date);
                                  }?>
                                    <?= $form->field($model, 'protect_start_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%',
                                           'onchange'=>'
                                              var partofdate = $(this).val().split("-");
                                              var newyear = parseInt(parseInt(partofdate[2]) + 1);
                                              var newdate = partofdate[0]+"-"+partofdate[1]+"-"+newyear;
                                              $("#protect_end_date").val(newdate);
                                            '
                                      ]])->label()
                                  ?>
                        </div>
                        <div class="col-lg-3">
                           <?php if(!$model->isNewRecord){
                                     $model->protect_end_date = date("d-m-Y",$model->protect_end_date);
                                  }?>
                               <?= $form->field($model, 'protect_end_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%','id'=>'protect_end_date']])->label()
                                  ?>
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'additional_protect')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'insure_capital')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                                  <?= $form->field($model, 'include_dis')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'total')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'total'])->label() ?>  
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'grand_total')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'grand_total'])->label() ?>    
                        </div>
                         <div class="col-lg-3">
                           <?php if(!$model->isNewRecord){
                                     $model->receive_date = date("d-m-Y",$model->receive_date);
                                  }else{
                                    $model->receive_date = date("d-m-Y");
                                  }
                                    ?>
                                   <?= $form->field($model, 'receive_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label()
                                  ?>   
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                          <label for="">รหัสตัวแทน</label>
                                             <select name="member_id" id="member_id" class="form-control" onchange="">
                                               <?php foreach($member as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->member_code;?></option>
                                             <?php endforeach;?>
                                             </select>
                                   <?php //echo $form->field($model, 'member_id')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($member,'id','member_code'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'member_id',
                                    //             'onchange'=>'
                                    //               $.post("index.php?r=insurance/getlevel&id=' . '"+$(this).val(),function(data){
                                    //                   $("select#level_id").empty();
                                    //                   $("select#level_id").append(data);
                                    //               });
                                    //               $.post("index.php?r=insurance/getintro&id=' . '"+$(this).val(),function(data){
                                    //                   $("select#intro_id").empty();
                                    //                   $("select#intro_id").append(data);
                                    //               });
                                    //               $.post("index.php?r=insurance/getline&id=' . '"+$(this).val(),function(data){
                                    //                    $("select#line_id").empty();
                                    //                   $("select#line_id").append(data);
                                    //               });
                                    //             '
                                    //            ],
                                    // ]

                                  //)->label() ?>     
                        </div>
                        <div class="col-lg-3">
                          <label for="">ระดับสมาชิก</label>
                                             <select name="level_id" id="level_id" disabled="disabled" class="form-control" onchange="alert();">
                                              <?php $lev = \backend\models\Memberlevel::find()->all(); ?>
                                               <?php foreach($lev as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                   <?php //echo $form->field($model, 'level_id')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map(\backend\models\Memberlevel::find()->all(),'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'level_id','disabled'=>'disabled'],
                                    // ]
                                   //)->label() ?>     
                        </div>
                        <div class="col-lg-3">
                                   <label for="">รหัสสมาชิกแนะนำ</label>
                                             <select name="intro_id"  id="intro_id" disabled="disabled" class="form-control" onchange="alert();">
                                              <?php $intro = \backend\models\Introduce::find()->all();?>
                                               <?php foreach($intro as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->intro_code." ".$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                   <?php //echo $form->field($model, 'intro_id')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map(\backend\models\Introduce::find()->all(),'id',function($data){
                                    //     return $data->intro_code." ".$data->name;
                                    //  }),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'intro_id','disabled'=>'disabled'],
                                    // ]

                                  //)->label() ?>     
                        </div>
                        <div class="col-lg-3">
                                          <label for="">รหัสสายงาน</label>
                                             <select name="line_id"  id="line_id" disabled="disabled" class="form-control" onchange="alert();">
                                              <?php $line = \backend\models\Line::find()->all(); ?>
                                               <?php foreach($line as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->line_code." ".$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                   <?php //echo $form->field($model, 'line_id')->widget(Select2::className(),
                                    //[
                                    //  'data'=> ArrayHelper::map(\backend\models\Line::find()->all(),'id',function($data){
                                    //     return $data->line_code." ".$data->name;
                                    //  }),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'line_id','disabled'=>'disabled'],
                                    // ]

                                 // )->label() ?>     
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                                  <?= $form->field($model, 'act_amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'act_amount'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                                <?= $form->field($model, 'score')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'score'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                           <label for="">โปรโมชั่น</label>
                                             <select name="promotion" id="promotion" class="form-control" onchange="alert();">
                                               <?php foreach($promotion as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                    <?php //echo $form->field($model, 'promotion')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map(Promotion::find()->all(),'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'promotion','placeholder'=>'เลือกโปรโมชั่น'],
                                    // ]

                                 // )->label() ?>
                        </div>
                         <div class="col-lg-3">
                          <?php 
                              if(!$model->isNewRecord){
                             $payment_type_id = \backend\models\Paymentchannel::getPaymentTypeId($model->payment_method);
                              }
                          ?>
                            <input type="hidden" name="payment_type_id" id="payment_type_id" value="<?=$model->isNewRecord?0:$payment_type_id?>" />
                            <label for="">วิธีชำระเงิน</label>
                                             <select name="payment_method" class="form-control" onchange="alert();">
                                              <?php $pay = \backend\models\Paymentchannel::find()->all();?>
                                               <?php foreach($pay as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->name;?></option>
                                             <?php endforeach;?>
                                             </select>
                                    <?php //echo $form->field($model, 'payment_method')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map(\backend\models\Paymentchannel::find()->all(),'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_payment_method','placeholder'=>'เลือกวิธีชำระเงิน',
                                    //           'onchange'=>'
                                    //        //   alert($(this).val());
                                    //               $.post("index.php?r=insurance/checkpaytype&id=' . '"+$(this).val(),function(data){
                                    //                 if($.inArray(data,["5","6","7"])!= -1){
                                    //                   //alert(data);
                                    //                   $("#tab_installment").show();
                                    //                 }else{
                                    //                   $("#tab_installment").hide();
                                    //                 }
                                    //               });
                                                  
                                    //           '
                                    // ],
                                    // ]

                                  //)->label() ?>
                        </div>
                       
                    </div>
                    
                       <hr />
                       <div class="row">
                        <div class="col-lg-3">
                                          <label for="">ระบุผู้ขับขี่</label>
                                             <select name="insure_driver" id="insure_driver" class="form-control" onchange="alert();">
                                              <?php $insure_type = \backend\helpers\InsureType::asArrayObject();?>
                                               <?php foreach($insure_type as $value):?>
                                               <option value="<?=$value->id?>"><?=$value->id;?></option>
                                             <?php endforeach;?>
                                             </select>
                                   <?php //echo $form->field($model, 'insure_driver')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map(\backend\helpers\InsureType::asArrayObject(),'id','name'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_driver'],
                                    // ]

                                  //)->label() ?>   
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'driver_one')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                         <div class="col-lg-3">
                           <?php if(!$model->isNewRecord){
                                     $model->driver_date_one = date("d-m-Y",$model->driver_date_one);
                                  }?>
                                    <?= $form->field($model, 'driver_date_one')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label()
                                  ?> 
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                                
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'driver_two')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                         <div class="col-lg-3">
                           <?php if(!$model->isNewRecord){
                                     $model->driver_date_two = date("d-m-Y",$model->driver_date_two);
                                  }?>
                                    <?= $form->field($model, 'driver_date_two')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label()
                                  ?>
                        </div>
                         <div class="col-lg-3">
                                
                        </div> 
                       
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                                   <?php if(!$model->isNewRecord){
                                     $model->insure_renew_date = date("d-m-Y",$model->insure_renew_date);
                                  }?>
                              <?= $form->field($model, 'insure_renew_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label()
                                  ?>
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'beneficiary')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                         <div class="col-lg-6">
                                  <?= $form->field($model, 'remark')->textarea(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                         
                       
                          </div>
                            
                           <hr />

                           <div class="row">
                            <div class="col-lg-3">
                              <p>ใบเสนอราคา</p>
                              <input type="text" class="form-control" readonly value="<?=\backend\models\Quotation::getQuotationNo($model->quotation_id);?>"/>
                              <?php //echo  $form->field($model, 'quotation_id')->textInput(['maxlength' => true,'class'=>'form-control form-inline','visibled'=>''])->label() ?>  
                            </div>
                           </div>
                         
                          </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab_2">
                    <div class="panel">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-8">
                                <?= $form->field($model, 'note_remark')->textarea(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?> 
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <?php $model->isNewRecord?'':$model->note_date = date('d-m-Y',$model->note_date);?>
                                <?= $form->field($model, 'note_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label()
                                  ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-8">

                                <?= $form->field($model, 'note_empid')->widget(Select2::className(),[
                                  'data'=> ArrayHelper::map(\backend\models\Employee::find()->all(),'id',function($data){
                                     return $data->first_name." ".$data->last_name;
                                  }),
                                  'options'=>['placeholder'=>'เลือกพนักงาน'],
                                  'pluginOptions'=>[
                                    'allowClear'=>true,
                                  ]
                                ]) ?> 
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <?= $form->field($model, 'note_status')->widget(Select2::className(),[
                                    'data'=> ArrayHelper::map(\backend\helpers\NoteStatus::asArrayObject(),'id','name')
                                ]) ?> 
                              </div>
                            </div>
                      </div>
                    </div>
                    
              </div>

              <div class="tab-pane" id="tab_3">
                  <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-default">
                            <div class="panel-heading">
                              <p><b>ประวัติการชำระเงิน</b></p>
                             </div>
                            <div class="panel-body">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>วันที่</th>
                                    <th>งวดที่</th>
                                    <th>ช่องทางชำระเงิน</th>
                                    <th>เลขที่</th>
                                    <th>จำนวนเงิน</th>
                                    <th>หลักฐานการชำระ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!$model->isNewRecord):?>
                                  <?php foreach($paymentdata as $value):?>
                                     <tr>
                                    <td><?=date('d-m-Y',$value->payment_date)?></td>
                                    <td><?=$value->period_no?></td>
                                    <td><?=\backend\helpers\PaymentType::getTypeById($value->payment_method)?></td>
                                    <td><?=\backend\models\BankAccount::getInfo($value->bank_account)?></td>
                                    <td><?=number_format($value->amount,0)?></td>
                                    <td><a class="btn btn-white view-line" href="index.php?r=insurance/pdf&id=<?=$value->attachfile?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                                  </tr>
                                <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                              </table>
                            </div>
                            </div>
                        </div>
                    </div>
              </div>


              <div class="tab-pane" id="tab_4">
                  <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-lg-2">
                             <?php echo "<h5>ประเภทไฟล์</h5>";?>
                            <?= $form->field($modelfile, 'filecategory')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\models\Filetype::find()->all(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'filecategory'],
                                    ]

                                  )->label(false) ?>   
                          </div>
                          <div class="col-lg-4">
                              <?php echo "<h5>แนบไฟล์</h5>";?>
                             <?php
                                 echo FileInput::widget([
                                     'model' => $modelfile,
                                     'attribute' => 'file[]',
                                     'id'=>'upfile',
                                     'options' => ['multiple' => true,'accept' => ['.TXT','.PDF','.PNG','.JPG','.GIF'],'style'=>'width: 300px'],
                                      'pluginOptions' => [
                                      'showUpload'=>false,
                                      'maxFileCount'=>5,
                                      ],
                                 ]);
                                 ?>
                          </div>
                        </div>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>หมวดหมู่ไฟล์</th>
                              <th>ชื่อไฟล์</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody class="docuref">
                            <?php if(!$model->isNewRecord):?>
                            <?php $i=0;?>
                            <?php foreach($model_filedata as $value):?>
                             <?php $i+=1;?>
                              <tr id="<?=$value->id?>">
                              <td><?=$i?></td>
                              <td><?= \backend\models\Filetype::getFileTypeName($value->doc_group_id)?></td>
                              <td><?=$value->name?></td>
                              <td>
                                 <a class="btn btn-white view-line" href="index.php?r=member/pdf&id=<?=$value->name?>" target="_blank"><i class="fa fa-eye"></i></a>
                                  <a class="btn btn-white remove-line" onClick="removeDocref($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                              </td>
                            </tr>
                          <?php endforeach;?>
                          <?php endif;?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-pane" id="tab_5">
                <div class="row">
                  <div class="col-lg-8">
                    <?= $form->field($model, 'photo_contact')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <?= $form->field($model, 'photo_number')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <?= $form->field($model, 'photo_remark')->textarea(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?> 
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab_6">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$installment_model->getAttributeLabel('period')?></label>
                       <div class="col-sm-4">
                           <input type="hidden" name="totalprice" id="alltotal" value="<?=(\backend\models\Payment::getPrice($model->id))?>"/>
                           <?php
                              if(!$model->isNewRecord){
                                if(count($installment_data)>0){
                                  $installment_model->period = $installment_data->period;
                                }
                              }
                            ?>
                           <?= $form->field($installment_model, 'period')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'period'])->label(false) ?>
                       </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$installment_model->getAttributeLabel('first_period')?></label>
                       <div class="col-sm-4">
                        <?php
                              if(!$model->isNewRecord){
                                if(count($installment_data)>0){
                                  $installment_model->first_period = number_format($installment_data->first_period,2);
                                }
                              }
                            ?>
                           <?= $form->field($installment_model, 'first_period')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'first_period'])->label(false) ?>
                       </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$installment_model->getAttributeLabel('remain')?></label>
                       <div class="col-sm-4">
                         <?php
                              if(!$model->isNewRecord){
                                if(count($installment_data)>0){
                                  $installment_model->remain = $installment_data->remain;
                                }
                              }
                            ?>
                           <?= $form->field($installment_model, 'remain')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'remain','readonly'=>'readonly'])->label(false) ?>
                       </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="form-group">
                      <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$installment_model->getAttributeLabel('period_per')?></label>
                       <div class="col-sm-4">
                         <?php
                              if(!$model->isNewRecord){
                                if(count($installment_data)>0){
                                  $installment_model->period_per = number_format($installment_data->period_per,2);
                                }
                              }
                            ?>
                           <?= $form->field($installment_model, 'period_per')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'period_per','readonly'=>'readonly'])->label(false) ?>
                       </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="form-group">
                      <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$installment_model->getAttributeLabel('fee')?></label>
                       <div class="col-sm-4">
                        <?php
                              if(!$model->isNewRecord){
                                if(count($installment_data)>0){
                                  $installment_model->fee = number_format($installment_data->fee,0);
                                }
                              }
                            ?>
                           <?= $form->field($installment_model, 'fee')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'fee'])->label(false) ?>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
               <div class="tab-pane" id="tab_7">
                    <div class="panel">
                      <div class="panel-body">
                          <div class="row">
                        <div class="col-lg-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              ความคุ้มครอง
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <!-- <a href="" class="btn-addprotect"><i class="fa fa-plus"></i> เพิ่มรายการ</a> -->
                                  <table class="table table-striped table-hover table-protect">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>ชื่อ</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวนเงิน</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="add-protect-body">
                                      <?php if(!$model->isNewRecord):?>
                                      <?php $cnt =0;?>
                                        <?php foreach($insure_package as $value):?>
                                        <?php $cnt+=1;?>
                                            <tr id="ordered-protect-id-">
                                                <td><?=$cnt;?></td>
                                                <td>
                                                  <div class="coverage_txt">
                                                    <?= ProtectTitle::getTypeById($value->coverage_type);?>
                                                  </div>
                                                  <input type="hidden" class="protectid" name="protectid[]" value="<?= $value->coverage_type;?>"/>
                                                </td>
                                                <td>
                                                  <!-- <input type="text" class="form-control name" name="name[]" value=""/> -->
                                                   <div class="protect_txt">
                                                    <?=\backend\models\Actprotect::getActprotectname($value->actprotect_id);?>
                                                  </div>
                                                <input type="hidden" class="name" name="name[]" value="<?= $value->amount;?>" />
                                                <input type="hidden" class="actprotectid" name="actprotectid[]" value="<?= $value->actprotect_id;?>" />
                                              </td>
                                              <td>
                                                  <!-- <input type="text" class="form-control name" name="name[]" value=""/> -->
                                                   <div class="amount_txt">
                                                    <?=number_format($value->amount);?>
                                                  </div>
                                                <input type="hidden" class="amount" name="amount[]" value="<?= $value->amount;?>" />
                                              </td>
                            
                                              <td class="action">
                                                  <!-- <a class="btn btn-white remove-line" onClick="protectremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                <a class="btn btn-white edit-line" onClick="protectEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                      <?php endif;?> 
                                    </tbody>
                                  </table>
                                </div>
                                
                              </div>
                              </div>
                              <!-- <div class="panel-footer">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="btn btn-default btn-copy-protect"><i class="fa fa-copy"></i> Copy ความคุ้มครอง</div>
                                  </div>              
                                </div>   
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
      </div>
    </div>



     
     
   
    
                

   <?php ActiveForm::end(); ?>
</div>



<div id="myModal-payment" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">?</button>
              <h3><i class="fa fa-check-circle text-success"></i> ชำระเงินค่าประกัน</h3>
          </div>
          <div class="modal-body">
             
          </div>
          <!-- <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Close</button>
          </div> -->
          </div>
        </div>
        </div>

<?php 
$url_to_payment = Yii::$app->getUrlManager()->createUrl('/payment/create2');
$url_to_payment_id = Yii::$app->getUrlManager()->createUrl('/payment/setpaymentid');
$this->registerJs('
    $(function(){

     $("#member_id").trigger("change");


      $("#tab_installment").hide();

      if($.inArray($("#payment_type_id").val(),["5","6","7"])!= -1){
           //alert(data);
            $("#tab_installment").show();
             }else{
               $("#tab_installment").hide();
      }

      var insuretype = "'.$model->insure_type_id.'";
      if(insuretype == 3){
        $("#insure_type_id").trigger("change");
      }
      $(".btn-payment").on("click",function(){
        var insureid = "'.$model->id.'";
        $.ajax({
          "type":"post",
          "dataType":"html",
          "url" : "'.$url_to_payment_id.'",
          "data": {insure_id:insureid},
          "success":function(data){
            //alert(data);
            $("#myModal-payment").modal("show").find(".modal-body").load("'.$url_to_payment.'");
          }
        });
        
      });
      
      $(".btn-copy-insure").click(function(){

           swal({
              title: "คุณต้องการ Copy เอกสารชุดนี้ใช่หรือไม่",
              text: "ระบบจะทำการคัดลอกรายละเอียดของใบแจ้งงานนี้",
              type: "warning",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            }, function () {
              // setTimeout(function () {
              //   swal("Ajax request finished!");
              // }, 2000);

                 var ids = "'.$model->id.'";
                  $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurance/copyinsure'], true).'",
                          data: {id: ids},
                          success: function(data){
                           // alert(data);
                
                          }
                  });

            });

         // if(confirm("คุณต้องการ Copy เอกสารชุดนี้ใช่หรือไม่")){
         //if(confirm()){
          //   var ids = "'.$model->id.'";
          //   $.ajax({
          //                  type: "POST",
          //                  dataType: "html",
          //                 url: "'.Url::toRoute(['/insurance/copyinsure'], true).'",
          //                 data: {id: ids},
          //                 success: function(data){
          //                  // alert(data);
                
          //                 }
          //         });
         //  }
      });

      $(".alert").show().fadeOut(5000);

      $("#period").change(function(){

      var peri = $(this).val();

      var total = $("#alltotal").val();
      var for_first = parseFloat((total)*(35+2)/100).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
      $("#first_period").val(for_first);

      var first = $("#first_period").val();
     
      var rem = 0;
      if(first == 0){
        rem = peri;
      }else{
        rem = peri - 1;
      }

      $("#remain").val(rem);
      var remain = $("#remain").val();
      var per_per = parseFloat((total)*(((100 - 35)/remain)/100)).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
      $("#period_per").val(per_per);

    });

    });

        function removeDocref(e){
              if(confirm("ต้องการลบรายการนี้ใช่หรือไม่ ?")){
                var recid = e.parent().parent().attr("id");
                 $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurance/removedoc'], true).'",
                          data: {id: recid},
                          success: function(data){
                           // alert(data);
                                  $(".docuref").empty();
                                  $(".docuref").append(data);
                                }
                  });
              }
              
            }
',static::POS_END);?>