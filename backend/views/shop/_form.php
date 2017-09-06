<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\FileInput;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Bank;

/* @var $this yii\web\View */
/* @var $model backend\models\Shop */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="shop-form">
    <?php $form = ActiveForm::begin(['class'=>'form-horizontal','options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ข้อมูลร้านค้า
                </div>
                <div class="panel-body">
                    <div class="row">
                       <div class="col-lg-12">
                          
                         
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('name')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'name'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="description" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('description')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'description')->textarea(['maxlength' => true,'class'=>'form-control','id'=>'description'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('taxid')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'taxid')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('license_no')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'license_no')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('email')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('address')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'address')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('zipcode')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('phone')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('mobile')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('logo')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'logo')->fileInput()->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('website')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'website')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('facebook')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'facebook')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-2" for="email" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('line')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'line')->textInput(['maxlength' => true,'class'=>'form-control','style'=>'width: 50%;'])->label(false) ?>
                                </div>
                           </div>


                    <?php //echo $form->field($model, 'status')->textInput() ?>

                    <?php //echo $form->field($model, 'created_at')->textInput() ?>

                    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

                    <?php //echo $form->field($model, 'created_by')->textInput() ?>

                    <?php //echo $form->field($model, 'updated_by')->textInput() ?>

                   
                       
                   
                        </div>
                   </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-5">
          
            <div class="panel panel-default">
                <div class="panel-heading">
                    โลโก้ร้านค้า
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;">   </label>
                                <div class="col-sm-10" style="padding: 10px 10px 10px 10px;">
                                   <div style="border-radius: 20px;border: 2px solid #73AD21;padding: 20px;width: 200px;height: 150px;text-align: center;">
                                      <?php echo Html::img('@web/uploads/logo/'.$model->logo,['style'=>'width:80%;'])?><br />
                                   </div>
                                   
                                </div>
            </div>
                    </div>
                  </div>
                </div>
               
              </div>
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
                         <th>เลขที่บัญชี</th>
                         <th>สาขา</th>
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
                                
                               <td>
                                <?= $value->account_no;?>
                                <input type="hidden" class="account_no" id="account_no" name="account_no[]" value="<?= $value->account_no;?>"/>
                              </td>
                               <td>
                                <?= $value->brance;?>
                                <input type="hidden" class="brance" name="brance[]" value="<?= $value->brance;?>"/>
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
                   <div class="btn btn-success btn-add-bank">เพิ่มบัญชีธนาคาร</div>
                </div>
              </div>
            </div>

                     
    </div>
    <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
                         <label class="control-label col-sm-2" for="email" style="bottom: -5px;"></label>
                                <div class="col-sm-10">
                                   <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                </div>
                       
                    </div>
      </div>
    </div>
</div>

  <?php ActiveForm::end(); ?>

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
    <?php
        $this->registerJs('
            $(function(){
                  $(".btn-add-bank").click(function(){
                    $("#myModal").modal("show");
                  });

                  $(".btn-addbank").click(function(e){
                  var type = $("#bank_id").val();
                  var account_no = $("#account_no").val();
                  var brances = $("#brance").val();
                  var bank_text = $("#bank_id option:selected").text();
                 
                    $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/shop/addbank'], true).'",
                          data: { txt: bank_text,id: type,account: account_no,brance: brances },
                          success: function(data){
                            //alert(data);
                                  $(".add-bank-body").append(data);
                                }
                      });
                  $("#myModal").modal("hide");
                });
            });
            function bankRemove(e){
              if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
                  e.parents("tr").remove();
              }
            }
',static::POS_END);
    ?>
