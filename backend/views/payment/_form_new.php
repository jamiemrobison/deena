<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\BankAccount;
use backend\models\Bank;
use backend\models\Insurance;


/* @var $this yii\web\View */
/* @var $model backend\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$bank = BankAccount::find()->select("bank_id")->where(['party_type_id'=>1])->distinct()->all();
$account = BankAccount::find()->where(['status'=> 1,'party_type_id'=>1])->all();
$insure_no = Insurance::find()->where(['id'=>$insureid])->one();
$paymenttypeid = $insure_no->payment_method;
if(in_array($paymenttypeid, ["2","3"])){
  $show_section_bank = 'style="display:"';
}else{
  $show_section_bank = 'style="display:none;"';
}
//print_r($installment);return;
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

     <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_a" data-toggle="tab">ชำระเงิน</a></li>
              <li><a href="#tab_d" data-toggle="tab">ตารางผ่อนชำระ</a></li>
              <li><a href="#tab_b" data-toggle="tab">ประวัติชำระเงิน</a></li>
              <li><a href="#tab_c" data-toggle="tab">แนบไฟล์</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_a">
                  <input type="hidden" name="insureid" value="<?=$insureid?>" />
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel">
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-lg-12">
                             <input type="hidden" name="insure_no" value="<?=$insureid?>" />
                              <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_code')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'payment_code')->textInput(['maxlength' => true,'class'=>'form-control form-inline','readonly'=>'readonly','value'=>$runno])->label(false) ?>
                                            </div>
                                       </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('insure_temp')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'insure_temp')->textInput(['maxlength' => true,'class'=>'form-control form-inline','value'=>$insure_no->insure_code,'readonly'=>'readonly'])->label(false) ?>
                                            </div>
                                       </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ทะเบียนรถ</label>
                                            <div class="col-sm-9">
                                              <div class="row">
                                                <div class="col-lg-2">
                                                  <input type="text" class="form-control" value="<?=\backend\models\Insurance::getPlateinfo($insureid,1);?>"/>
                                                </div>
                                                   <div class="col-lg-3">
                                                    <input type="text" class="form-control" value="<?=\backend\models\Insurance::getPlateinfo($insureid,2);?>"/>
                                                </div>
                                                   <div class="col-lg-4">
                                                    <input type="text" class="form-control" value="<?=\backend\models\Insurance::getPlateinfo($insureid,3);?>"/>
                                                </div>
                                              </div>
                                            </div>
                                       </div> 
                          </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_date')?></label>
                                            <div class="col-sm-9">
                                              <?php $model->isNewRecord?$model->payment_date = date('d-m-Y'):$model->payment_date;?>
                                              <?= $form->field($model, 'payment_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                                      'format' => 'dd-mm-yyyy',
                                                      //'value' => date('dd-mm-yyyy'),
                                                      'autoclose' => true,
                                                      'todayHighlight' => true
                                                  ], 'options' => ['style' => 'width: 100%']])->label(false)
                                              ?>
                                            </div>
                                       </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_method')?></label>
                                            <div class="col-sm-9">
                                              <?php
                                               $paymenttype = 0;
                                               if(count($insure_payment_data)>0){
                                                  $paymenttype = $insure_payment_data->payment_method;
                                                  $model->payment_method = $paymenttype;
                                              }
                                              ?>
                                              <?= $form->field($model, 'payment_method')->widget(Select2::className(),
                                                [
                                                 'data'=> ArrayHelper::map(\backend\models\Paymentchannel::find()->all(),'id','name'),
                                                'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'payment_method',
                                                  'onchange'=>'
                                                      if($(this).val()==2){
                                                        //alert($(this).val());
                                                          $("#bank_id").prop("disabled","");
                                                          //$("#bank_account").prop("disabled","");
                                                      }else{
                                                           $("#bank_id").attr("disabled","disabled");
                                                           $("#bank_account").attr("disabled","disabled");
                                                      }
                                                  '
                                                ],
                                                ]

                                              )->label(false) ?>    
                                              <input type="hidden" name="payment_method" value="<?=$paymenttype?>"/>
                                            </div>
                                       </div>

                                       <div class="" id="bank_section" <?php echo $show_section_bank;?>>
                                       <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('bank_id')?></label>
                                            <div class="col-sm-9">
                                               <?= $form->field($model, 'bank_id')->widget(Select2::className(),
                                                [
                                                 'data'=> ArrayHelper::map($bank,'bank_id',function($data){
                                                     return Bank::getBankName($data->bank_id);
                                                 }),
                                                'options'=>['placeholder'=>'เลือกธนาคาร','maxlength' => true,'class'=>'form-control form-inline','id'=>'bank_id',
                                                    'onchange'=>'
                                                      $.post("index.php?r=payment/showaccount&id=' . '"+$(this).val(),function(data){
                                                       // alert(data);
                                                      $("select#bank_account").html(data);
                                                      $("select#bank_account").prop("disabled","");
                                                    });
                                                    
                                                  '
                                                ],
                                                ]

                                              )->label(false) ?>    
                                            </div>
                                       </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('bank_account')?></label>
                                            <div class="col-sm-9">
                                                <?= $form->field($model, 'bank_account')->widget(Select2::className(),
                                                [
                                                 'data'=> ArrayHelper::map($account,'id','name'),
                                                'options'=>['placeholder'=>'เลือกเลขที่บัญชี','maxlength' => true,'class'=>'form-control form-inline','id'=>'bank_account'],
                                                ]

                                              )->label(false) ?>   
                                            </div>
                                       </div>
                                      </div>
                                      
                                     <!--   <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'status')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                            </div>
                                       </div> -->
                                       
                                      <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('period_no')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'period_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline','value'=>$count_period>0?$count_period:1,'readonly'=>'readonly'])->label(false) ?>
                                            </div>
                                       </div>
                                       
                                     <!--   <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_time')?></label>
                                            <div class="col-sm-9">
                                              <?php //echo $form->field($model, 'payment_time')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                            </div>
                                       </div> -->
                                         
                                       <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('amount')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                            </div>
                                       </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('fee')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'fee')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                            </div>
                                       </div>
                                      

                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('remark')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'remark')->textarea(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                            </div>
                                       </div>
                                   
                              
                            </div>
                            </div>
                            <!-- <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ผลต่าง</label>
                                            <div class="col-sm-9">
                                              <div class="row">
                                                <div class="col-lg-4">
                                                  <input type="text" class="form-control" value=""/>
                                                </div>

                                              </div>
                                            </div>
                                       </div> <br />

                              </div>
                            </div> <br /> -->
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ชำระแล้ว</label>
                                            <div class="col-sm-9">
                                              <div class="row">
                                                 <div class="col-lg-4">
                                                    <input type="text" class="form-control" readonly value="<?=number_format(\backend\models\Insurance::getPaymentsum($insureid));?>"/>
                                                </div>
                                                 
                                              </div>
                                            </div>
                                       </div> <br />
                                      
                              </div>
                            </div> <br />
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ค้างชำระ</label>
                                            <div class="col-sm-9">
                                              <div class="row">
                                                 <div class="col-lg-4">
                                                    <input type="text" class="form-control" readonly value="<?=number_format((\backend\models\Payment::getPrice($insureid)) - (\backend\models\Insurance::getPaymentsum($insureid)));?>"/>
                                                </div>
                                                 
                                              </div>
                                            </div>
                                       </div> <br />
                                      
                              </div>
                            </div> <br />
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">เบี้ยรวม</label>
                                            <div class="col-sm-9">
                                              <div class="row">
                                               
                                                  <div class="col-lg-4">
                                                    <input type="text" class="form-control" readonly value="<?=number_format(\backend\models\Payment::getPrice($insureid));?>"/>
                                                </div>
                                                 <!--     <div class="col-lg-4">
                                                    <input type="text" class="form-control" value="<?=\backend\models\Insurance::getPlateinfo($insureid,3);?>"/>
                                                </div> -->
                                              </div>
                                            </div>
                                       </div> <br />
                                      
                              </div>
                            </div>

                              <hr />
                               
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div class="col-lg-6">
                                         <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"></label>
                                            <div class="col-sm-9">
                                              <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                            </div>
                                       </div>
                                    </div>
                                       
                                    </div>
                                </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane" id="tab_b">
                <div class="row">
                        <div class="col-lg-12">
                           <!-- <div class="box box-default"> -->
                        
<!--                             <div class="box-body"> -->
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
                                  <?php //if(!$model->isNewRecord):?>
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
                                <?php //endif;?>
                                </tbody>
                              </table>
                            <!-- </div> -->
                           <!--  </div> -->
                        </div>
                    </div>
              </div>
               <div class="tab-pane" id="tab_c">
                  <div class="row">
                                    <div class="col-lg-12">
                                         <div class="form-group">
                                            <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('attachfile')?></label>
                                            <div class="col-sm-9">
                                              <?= $form->field($model, 'attachfile')->fileInput(['maxlength' => true,'class'=>'form-inline'])->label(false) ?>
                                            </div>
                                       </div>
                                    </div>
                   </div>
              </div>
              <div class="tab-pane" id="tab_d">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$installment_model->getAttributeLabel('period')?></label>
                       <div class="col-sm-4">
                           <input type="hidden" name="totalprice" id="alltotal" value="<?=(\backend\models\Payment::getPrice($model->id))?>"/>
                           <?php
                                if(count($installment)>0){
                                  $installment_model->period = $installment->period;
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
                              
                                if(count($installment)>0){
                                  $installment_model->first_period = number_format($installment->first_period,2);
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
                              
                                if(count($installment)>0){
                                  $installment_model->remain = $installment->remain;
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
                             
                                if(count($installment)>0){
                                  $installment_model->period_per = number_format($installment->period_per,2);
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
                             
                                if(count($installment)>0){
                                  $installment_model->fee = number_format($installment->fee,0);
                                }
                             
                            ?>
                           <?= $form->field($installment_model, 'fee')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'fee'])->label(false) ?>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
      </div>

    
    <?php ActiveForm::end(); ?>

</div>

<?php 
  $this->registerJs('
    $("#bank_id").prop("disabled","disabled");
    $("#bank_account").prop("disabled","disabled");
    $("select#payment_method").prop("disabled","disabled");

    var payment_type = "'.$paymenttypeid.'";
    //alert(payment_type);
    if($.inArray(payment_type,[2,3])){
      $("select#payment_method").prop("disabled","disabled");
      $("select#bank_id").prop("disabled","");
      $("select#bank_account").prop("disabled","");
    }

    // $("#period").change(function(){

    //   var peri = $(this).val();

    //   var total = $("#alltotal").val();

    //   $("#first_period").val((total)*(35+2)/100);

    //   var first = $("#first_period").val();
     
    //   var rem = 0;
    //   if(first == 0){
    //     rem = peri;
    //   }else{
    //     rem = peri - 1;
    //   }

    //   $("#remain").val(rem);
    //   var remain = $("#remain").val();
    //   var per_per = (total)*(((100 - 35)/remain)/100);
    //   $("#period_per").val(per_per);

    // });

    ',static::POS_END);
?>
