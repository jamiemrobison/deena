<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Bank;
use backend\helpers\BankAccountType;
use backend\models\Product;

/* @var $this yii\web\View */
/* @var $model backend\models\Insurancecompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insurancecompany-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            ข้อมูลบริษัทประกัน
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                 
                               <!--  <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;">โลโก้</label> -->
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('name')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'name'])->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('short_name')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'short_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'short_name'])->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('found_date')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'found_date')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'found_date'])->label(false) ?>
                                </div>
                           </div>
                          <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('reg_capital')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'reg_capital')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'reg_capital'])->label(false) ?>
                                </div>
                           </div>
                                   <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('credit_limit')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'credit_limit')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'credit_limit'])->label(false) ?>
                                </div>
                           </div>
                                 
                                  <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_term')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'payment_term')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'payment_term'])->label(false) ?>
                                </div>
                           </div>
                                  <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('vat')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'vat')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'vat'])->label(false) ?>
                                </div>
                           </div>
                                  <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('emergency_call')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'emergency_call')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'emergency_call'])->label(false) ?>
                                </div>
                           </div>
                               <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('logo')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'logo')->fileInput()->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-10">
                                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                                </div>
                           </div>
                                 
                             
              
               

                <?php //echo $form->field($model, 'logo')->fileInput(['maxlength' => true]) ?>

                

                 
                </div>
               
                </div>

                
          
                
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    ข้อมูลธนาคาร
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                     <table class="table table-striped table-hover table-bank">
                      <thead>
                        <tr>
                         <th style="width: 40px;"></th>
                         <th>ธนาคาร</th>
                         <th>ชื่อย่อ</th>
                         <th>เลขที่บัญชี</th>
                         <th>สาขา</th>
                         <th>ประเภท</th>
                         <th></th>
                       </tr>
                      </thead>
                       <tbody class="add-bank-body">
                         <?php if(!$model->isNewRecord):?>
                            <?php foreach($model_bankdata as $value):?>
                              <tr id="shop-bank-id">
                                <td>
                                  <?= Html::img('@web/uploads/logo/'.Bank::getLogo($value->bank_id),['style'=>'width: 100%;']);?>
                                  <input type="hidden" class="bank_id" name="bank_id[]" value="<?= $value->bank_id;?>"/>
                                </td>
                                <td><?= Bank::getBankName($value->bank_id);?></td>
                                
                                <td><?= Bank::getBankshortname($value->bank_id);?></td>
                                
                               <td>
                                <?= $value->account_no;?>
                                <input type="hidden" class="account_no" id="account_no" name="account_no[]" value="<?= $value->account_no;?>"/>
                              </td>
                               <td>
                                <?= $value->brance;?>
                                <input type="hidden" class="brance" name="brance[]" value="<?= $value->brance;?>"/>
                              </td>
                               <td>
                                <?= BankAccountType::getTypeById($value->account_type);?>
                                <input type="hidden" class="account_type" name="brance[]" value="<?= $value->account_type;?>"/>
                              </td>
                                
                              <td class="action">
                                  <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
                                  <a class="btn btn-white remove-line" onClick="bankRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                         <?php endif;?>
                       </tbody>
                     </table>
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                   <div class="btn btn-primary btn-add-bank">เพิ่มบัญชีธนาคาร</div>
                </div>
              </div>
            </div>
            
                  
                </div>
                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                            <div class="panel-heading">
                              คอมมิทชั่นรับ
                            </div>
                            <div class="panel-body">
                              <table class="table table-striped table-hover table-commission">
                                  <thead>
                                    <tr>
                                     
                                     <th>กรรมธรรม์</th>
                                     <th>ชื่อโปรโมชั่น</th>
                                     <th>คอมมิทชั่นรับ %</th>
                                     <th>คอมมิทชั่นรับ</th>
                                     <th></th>
                                   </tr>
                                  </thead>
                                   <tbody class="add-commission-body">
                                    <?php if(!$model->isNewRecord):?>
                                        <?php foreach($model_commissiondata as $value):?>
                                          <tr id="shop-bank-id">
                                            <td>
                                              <?= Product::getProdname($value->insure_type);?>
                                              <input type="hidden" class="commission_id" name="commission_id[]" value="<?= $value->insure_type;?>"/>
                                            </td>
                                           <td>
                                            <?= $value->promotion_name;?>
                                            <input type="hidden" class="promotion" id="promotion" name="promotion[]" value="<?= $value->promotion_name;?>"/>
                                          </td>
                                           <td>
                                            <?= $value->commission_percent;?>
                                            <input type="hidden" class="commission_per" name="commission_per[]" value="<?= $value->commission_percent;?>"/>
                                          </td>
                                           <td>
                                            <?= $value->commission_amont;?>
                                            <input type="hidden" class="commission_amount" name="commission_amount[]" value="<?= $value->commission_amont;?>"/>
                                          </td>
                                            
                                          <td class="action">
                                              <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
                                              <a class="btn btn-white remove-line" onClick="commissionRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                     <?php endif;?>
                                   </tbody>
                                 </table>
                            </div>
                            <div class="panel-footer">
                   <div class="btn btn-primary btn-add-commission">เพิ่มคอมมิทชั่นรับ</div>
                </div>
                          </div>
                    </div>
                </div>
   <div class="row">
                  <div class="col-lg-6">
                    <div class="form-inline">
                        <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>     
                </div>
                  </div>
                </div>
    <?php ActiveForm::end(); ?>

</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>เพิ่มบัญชีธนาคาร</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-bank']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_bankaccount->getAttributeLabel('bank_id')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_bankaccount, 'bank_id')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\models\Bank::find()->all(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'bank_id'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>
                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_bankaccount->getAttributeLabel('short_name')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_bankaccount, 'short_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'short_name'])->label(false) ?>
                                              </div>
                                         </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_bankaccount->getAttributeLabel('account_no')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_bankaccount, 'account_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'account_no'])->label(false) ?>
                                              </div>
                                         </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_bankaccount->getAttributeLabel('brance')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_bankaccount, 'brance')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'brance'])->label(false) ?>
                                              </div>
                                         </div>
                                         <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_bankaccount->getAttributeLabel('account_type')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_bankaccount, 'account_type')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\BankAccountType::asArrayObject(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'account_type'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                         </div>

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-addbank">ตกลง</div>
                                </div>
                              </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>

    <?php ActiveForm::end(); ?>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Close</button>
          </div> -->
          </div>
        </div>
        </div>


        <div id="myModal-commission" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>เพิ่มค่าคอมมิทชั่น</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-commission']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_commission, 'insure_type')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\models\Product::find()->all(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'insure_type'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>
                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_commission->getAttributeLabel('promotion_name')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_commission, 'promotion_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'promotion_name'])->label(false) ?>
                                              </div>
                                         </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_commission->getAttributeLabel('commission_percent')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_commission, 'commission_percent')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'commission_percent'])->label(false) ?>
                                              </div>
                                         </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_commission->getAttributeLabel('commission_amont')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_commission, 'commission_amont')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'commission_amont'])->label(false) ?>
                                              </div>
                                         </div>
                                         

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-addcommission">ตกลง</div>
                                </div>
                              </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>

    <?php ActiveForm::end(); ?>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Close</button>
          </div> -->
          </div>
        </div>
        </div>
<?php
        $this->registerJs('
            $(function(){
                  $(".btn-add-bank").click(function(){

                    $("#myModal").modal("show");
                    $("#form-bank").reset();
                  });

                  $(".btn-add-commission").click(function(){

                    $("#myModal-commission").modal("show");
                    $("#form-commission").reset();
                  });

                  $(".btn-addbank").click(function(e){
                  var type = $("#bank_id").val();
                  var account_no = $("#account_no").val();
                  var brances = $("#brance").val();
                  var bank_text = $("#bank_id option:selected").text();
                  var accounttype = $("#account_type").val();
                 
                    $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addbank'], true).'",
                          data: { txt: bank_text,id: type,account: account_no,brance: brances,account_type: accounttype},
                          success: function(data){
                            //alert(data);
                                  $(".add-bank-body").append(data);
                                }
                      });
                  $("#myModal").modal("hide");
                });

                 $(".btn-addcommission").click(function(e){
                  var type = $("#insure_type").val();
                  var promotions = $("#promotion_name").val();
                  var desper = $("#commission_percent").val();
                  var insure_text = $("#insure_type option:selected").text();
                  var amt = $("#commission_amont").val();
                 
                    $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addcommission'], true).'",
                          data: { txt: insure_text,id: type,promotion: promotions,disc_per: desper,amount: amt},
                          success: function(data){
                            //alert(data);
                                  $(".add-commission-body").append(data);
                                }
                      });
                  $("#myModal-commission").modal("hide");
                });
            });
            function bankRemove(e){
              if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
                  e.parents("tr").remove();
              }
            }
             function commissionRemove(e){
              if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
                  e.parents("tr").remove();
              }
            }
',static::POS_END);
    ?>
