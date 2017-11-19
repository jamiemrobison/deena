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
// $prod = Product::find()->where(['status'=> 1])->all();
// $brand = Carbrand::find()->where(['status'=> 1])->all();
// $member = Member::find()->where(['status'=> 1])->all();
// $province = Province::find()->where(['status'=> 1])->all();
// $car = Car::find()->where(['status'=> 1])->all();
// $caryear = Caryear::find()->where(['status'=> 1])->all();
// $carinfo = Carinfo::find()->where(['status'=> 1])->all();
// $act = Act::find()->where(['status'=> 1])->all();
// $prov = Province::find()->all();
// $amp = Amphur::find()->all();
// $dist = District::find()->all();

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
                                             <?= $form->field($model, 'insure_company_id')->widget(Select2::className(),
                                                    [
                                                     'data'=> ArrayHelper::map($insure_com,'id','name'),
                                                    'options'=>['placeholder'=>'เลือกบริษัทประกัน','maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_company_id',
                                                        'onchange'=>'
                                                                $.post("index.php?r=insurance/showproduct&id=' . '"+$(this).val(),function(data){
                                                                  $("select#product_id").html(data);
                                                                });
                                                        '
                                                    ],
                                                    ]

                                                  )->label() ?>
                                        </div>
                                         <div class="col-lg-3">
                                                  <?= $form->field($model, 'insure_type_id')->widget(Select2::className(),
                                                    [
                                                     'data'=> ArrayHelper::map($cat,'id','name'),
                                                    'options'=>['placeholder'=>'เลือกประเภท','maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_type_id',
                                                        'onchange'=>'
                                                            if($(this).val()==1){
                                                              $("#product_id").prop("disabled","");
                                                              $("#car_code").prop("disabled","");
                                                              $("#car_brand").prop("disabled","");
                                                                $.post("index.php?r=insurance/showcarcode&id=1",function(data){
                                                                  $("select#car_code").html(data);
                                                                });
                                                            }else if($(this).val()==3){
                                                              $("#product_id").prop("disabled","disabled").empty();
                                                              $("#car_code").prop("disabled","");
                                                              $("#car_brand").prop("disabled","disabled");

                                                                $.post("index.php?r=insurance/showcarcode&id=2",function(data){
                                                                  $("select#car_code").html(data);
                                                                });

                                                            }else{
                                                               $("#product_id").prop("disabled","disabled");
                                                              $("#car_code").prop("disabled","disabled").empty();
                                                              $("#car_brand").prop("disabled","disabled");

                                                            }
                                                            
                                                        '
                                                     ],

                                                    ]

                                                  )->label() ?>    
                                        </div>
                                        
                                    </div>
                  
                    <div class="row">
                       <div class="col-lg-3">
                                
                        </div> 
                        <div class="col-lg-3">
                                  <?= $form->field($model, 'insure_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                             <?= $form->field($model, 'id_card')->textInput(['maxlength' => 13,'class'=>'form-control form-inline'])->label() ?>  
                        </div>
                         <div class="col-lg-3">
                               
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
                                  
                        </div> 
                         <div class="col-lg-3">
                                
                        </div>
                         <div class="col-lg-3">
                          
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
                      
                        </div>
                         <div class="col-lg-3">
                                  <?= $form->field($model, 'car_usage')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_usage'])->label() ?>    
                        </div>
                        <div class="col-lg-3">
                            
                        </div>
                         <div class="col-lg-3">
                             
                        </div>
                        <div class="col-lg-3">
                            
                        </div>
                         <div class="col-lg-1">
                                  <?= $form->field($model, 'plate_category')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div> 
                           <div class="col-lg-2">
                                  <?= $form->field($model, 'plate_license')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label() ?>    
                        </div> 
                        <div class="col-lg-3">
                          
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
                                  
                        </div>
                        <div class="col-lg-3">
                                   
                        </div>
                        <div class="col-lg-3">
                                  
                        </div>
                        <div class="col-lg-3">
                                   
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
                                    <?= $form->field($model, 'promotion')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(Promotion::find()->all(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'promotion','placeholder'=>'เลือกโปรโมชั่น'],
                                    ]

                                  )->label() ?>
                        </div>
                         <div class="col-lg-3">
                          <?php 
                              if(!$model->isNewRecord){
                             $payment_type_id = \backend\models\Paymentchannel::getPaymentTypeId($model->payment_method);
                              }
                          ?>
                            <input type="hidden" name="payment_type_id" id="payment_type_id" value="<?=$model->isNewRecord?0:$payment_type_id?>" />
                                    
                        </div>
                       
                    </div>
                    

                       <hr />
                       <div class="row">
                        <div class="col-lg-3">
                                  
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
                                
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                               
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