 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use softark\duallistbox\DualListbox;
use yii2mod\alert\Alert;


use backend\helpers\ProtectTitle;
use backend\helpers\ConditionTitle;
use backend\models\Promotion;


/* @var $this yii\web\View */
/* @var $model backend\models\Package */
/* @var $form yii\widgets\ActiveForm */
$servicetype = \backend\helpers\Servicetype::asArrayObject();
$add_protect_url = Yii::$app->getUrlManager()->createUrl('/packagedetail/create');
$list_protect_url = Yii::$app->getUrlManager()->createUrl('/packagedetail/list');


?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>
     <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>
      </div>
     </div>

     <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลแพ็กเก็จ</a></li>
              <li><a href="#tab_2" data-toggle="tab">ความคุ้มครอง</a></li>
              <li><a href="#tab_3" data-toggle="tab">เงื่อนไข</a></li>
              <li><a href="#tab_4" data-toggle="tab">โปรโมชั่น</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-lg-12">
                        
                            <div class="row">
                              <div class="col-lg-6">
                                    <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('package_code')?></label>
                                                <div class="col-sm-8">
                                                  <?= $form->field($model, 'package_code')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                                </div>
                                           </div>

                                           <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('name')?></label>
                                                <div class="col-sm-8">
                                                  <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                                </div>
                                           </div>
                                    <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('company_insure')?></label>
                                                <div class="col-sm-8">
                                                  <?= $form->field($model, 'company_insure')->widget(Select2::className(),
                                                    [
                                                     'data'=> ArrayHelper::map(\backend\models\Insurancecompany::find()->all(),'id','short_name'),
                                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'company'],
                                                    ]

                                                  )->label(false) ?>
                                                </div>
                                    </div>
                                    <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('insure_type')?></label>
                                                <div class="col-sm-8">
                                                  <?= $form->field($model, 'insure_type')->widget(Select2::className(),
                                                    [
                                                     'data'=> ArrayHelper::map(\backend\models\Product::find()->all(),'id',function($data){
                                                        return $data->product_code.' '.$data->name;
                                                     }),
                                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'type'],
                                                    ]

                                                  )->label(false) ?>
                                                </div>
                                    </div>


                                   <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('start_date')?></label>
                                                <div class="col-sm-8">
                                                  <?php if($model->isNewRecord){$model->start_date = date('d-m-Y');}else{$model->start_date=date('d-m-Y',$model->start_date);}?>
                                                  <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                                          'format' => 'dd-mm-yyyy',
                                                          //'value' => date('dd-mm-yyyy'),
                                                          'autoclose' => true,
                                                          'todayHighlight' => true
                                                      ], 'options' => ['style' => 'width: 100%']])->label(false)
                                                  ?>
                                                </div>
                                           </div>

                                     <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('end_date')?></label>
                                                <div class="col-sm-8">
                                                  <?php if($model->isNewRecord){$model->end_date = date('d-m-Y');}else{$model->end_date=date('d-m-Y',$model->end_date);}?>
                                                  <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                                          'format' => 'dd-mm-yyyy',
                                                          //'value' => date('dd-mm-yyyy'),
                                                          'autoclose' => true,
                                                          'todayHighlight' => true
                                                      ], 'options' => ['style' => 'width: 100%']])->label(false)
                                                  ?>
                                                </div>
                                           </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('service_type')?></label>
                                                <div class="col-sm-8">
                                                    <?= $form->field($model, 'service_type')->widget(Select2::className(),
                                                                    [
                                                                     'data'=> ArrayHelper::map($servicetype,'id','name'),
                                                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'level'],
                                                                    ]

                                                                  )->label(false) ?>
                                                              </div>
                                                          </div>
                                     <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                                <div class="col-sm-8">
                                                    <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                                            </div>
                                        </div>
                                 
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('car_code')?></label>
                                                <div class="col-sm-8">
                                                  <?= $form->field($model, 'car_code')->widget(Select2::className(),
                                                    [
                                                     'data'=> ArrayHelper::map(\backend\models\Car::find()->all(),'id',function($data){
                                                        return $data->car_code.' '.$data->name;
                                                     }),
                                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_code'],
                                                    ]

                                                  )->label(false) ?>
                                                </div>
                                    </div>
                                  <div class="form-group">
                                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('score_rate')?></label>
                                                <div class="col-sm-8">
                                                  <?= $form->field($model, 'score_rate')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                                </div>
                                           </div>
                                          
                                </div>
                                </div>
                                
                            </div>
                          </div>
                          <hr />
                          <div class="car-package">
                            <div class="row">
                              <div class="col-lg-12">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4>รายการรถที่ใช้แพ็กเก็จ</h4>
                                </div>
                                <div class="panel-body">
                                  <?php
                                $options = [
                                  'multiple' => false,
                                  'size' => 20,
                                  'class'=>'form-control',

                              ];
                                $selection = [];
                              if (!$model->isNewRecord) {

                                  if (count($model_car_select) > 0) {
                                      foreach ($model_car_select as $data) {
                                          array_push($selection, $data->car_id);
                                      }
                                  }
                              }

                              $items = ArrayHelper::map(\backend\models\Carinfo::find()->all(),'id',function($data){
                                 $brand = $data->findBrand($data->brand);
                                 return $brand." - ".$data->model;
                              });
                                    echo DualListbox::widget([
                                      'name' => 'carlistbox[]',
                                      //'model' => $modelcorect,
                                      // 'attribute' => 'recid',
                                      'selection' => $selection,
                                      'items' => $items,
                                      'options' => $options,
                                      'clientOptions' => [
                                          'moveOnSelect' => false,
                                          'nonSelectedListLabel' => 'รายการทั้งหมด',
                                          'selectedListLabel' => 'รายการที่เลือกแล้ว',
                                          'infoText'=>'จำนวนรายการ {0}',
                                          'infoTextEmpty'=>'ไม่มีรายการ',
                                          'filterPlaceHolder'=>'ค้นหา',
                                          'filterTextClear'=>'แสดงทั้งหมด',     
                                          'infoTextFiltered'=>'<span class="label label-warning">ค้นหาเจอ</span> {0} จาก {1}'               ],
                                  ]);
                              ?>
                                </div>
                              </div>
                                
                              </div>
                            </div>
                          </div>


              </div>
              <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              ความคุ้มครอง
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <a href="" class="btn-addprotect"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
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
                                        <?php foreach($model_protect_detail as $value):?>
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
                                                  <a class="btn btn-white remove-line" onClick="protectremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                <a class="btn btn-white edit-line" onClick="protectEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
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
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="btn btn-default btn-copy-protect"><i class="fa fa-copy"></i> Copy ความคุ้มครอง</div>
                                  </div>              
                                </div>   
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
                            
                            เงื่อนไขการคุ้มครอง
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <a href="" class="btn-addcondition"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
                                <table class="table table-striped table-hover table-condition">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>ชื่อ</th>
                                      <th>รายละเอียด</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody class="add-condition-body">
                                    <?php if(!$model->isNewRecord):?>
                                    <?php $cnt =0;?>
                                      <?php foreach($model_condition_detail as $value):?>
                                      <?php $cnt+=1;?>
                                          <tr id="ordered-condition-id-">
                                              <td><?=$cnt;?></td>
                                              <td>
                                                <div class="condition_txt">
                                                  <?= ConditionTitle::getTypeById($value->title_id);?>
                                                </div>
                                                <input type="hidden" class="conditionid" name="conditionid[]" value="<?= $value->title_id;?>"/>
                                              </td>
                                             
                                                <!-- <input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
                                              <td>
                                                <div class="desc_txt">
                                                  <?= $value->condition_text;?>
                                                </div>
                                                <input type="hidden" class="desc_condition" name="desc_condition[]" value="<?= $value->condition_text;?>" />
                                             
                                              </td>
                                              
                                            <td class="action">
                                                <a class="btn btn-white remove-line" onClick="conditionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                <a class="btn btn-white edit-line" onClick="conditionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
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
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="btn btn-default btn-copy-condition"><i class="fa fa-copy"></i> Copy เงื่อนไข</div>
                                </div>              
                              </div>   
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
                              โปรโมชั่น
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <a href="" class="btn-addpromotion"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
                                  <table class="table table-striped table-hover table-protect">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>รหัสโปรโมชั่น</th>
                                        <th>ชื่อ</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวนเงิน</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="add-promotion-body">
                                      <?php if(!$model->isNewRecord):?>
                                      <?php $cnt =0;?>
                                        <?php foreach($model_promotion_data as $value):?>
                                        <?php $cnt+=1;?>
                                            <tr id="ordered-protect-id-">
                                                <td><?=$cnt;?></td>
                                                <td>
                                                  <div class="code_txt">
                                                    <?= \backend\models\Promotion::getPromotioninfo($value->promotion_id)->code;?>
                                                  </div>
                                                  <input type="hidden" class="promot_id" name="promot_id[]" value="<?=$value->promotion_id?>"/>
                                                </td>
                                                <td>
                                                  <!-- <input type="text" class="form-control name" name="name[]" value=""/> -->
                                                   <div class="promot_name_txt">
                                                    <?=\backend\models\Promotion::getPromotioninfo($value->promotion_id)->name;?>
                                                  </div>
                                              </td>
                                              <td>
                                                  <!-- <input type="text" class="form-control name" name="name[]" value=""/> -->
                                                   <div class="promot_desc_txt">
                                                    <?=\backend\models\Promotion::getPromotioninfo($value->promotion_id)->description;?>
                                                  </div>
                                              </td>
                                              <td>
                                                  <!-- <input type="text" class="form-control name" name="name[]" value=""/> -->
                                                   <div class="amount_txt">
                                                   <?=\backend\models\Promotion::getPromotioninfo($value->promotion_id)->amount;?>
                                                  </div>
                                              </td>
                            
                                              <td class="action">
                                                  <a class="btn btn-white remove-line" onClick="promotionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                 <!-- <a class="btn btn-white edit-line" onClick="protectEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
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
                                    <div class="btn btn-default btn-copy-protect"><i class="fa fa-copy"></i> Copy โปรโมชั่น</div>
                                  </div>              
                                </div>   
                              </div> -->
                            </div>
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
              <h3>เพิ่มความคุ้มครอง</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-protect']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_protect->getAttributeLabel('coverage_type')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_protect, 'coverage_type')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\ProtectTitle::asArrayObject(),'id','name'),
                                                  'options'=>['placeholder'=>'เลือกรายการ','maxlength' => true,'class'=>'form-control form-inline','id'=>'coverage_type',
                                                     'onchange'=>'
                                                        $.post("index.php?r=package/showactprotect&id=' . '"+$(this).val(),function(data){
                                                        $("select#actprotect_id").html(data);
                                                        $("select#actprotect_id").prop("disabled","");
                                                        if(protect_current_id > -1){
                                                          $("select#actprotect_id").val(protect_current_id).trigger("change");
                                                          protect_current_id = -1;
                                                        }

                                                      });
                                                     '
                                                  ],
                                                  'pluginOptions'=>[
                                                    'allowClear'=>true,
                                                  ]
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_protect->getAttributeLabel('converage_detail')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_protect, 'actprotect_id')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\ProtectTitle::asArrayObject(),'id','name'),
                                                  'options'=>['placeholder'=>'เลือกรายการ','maxlength' => true,'class'=>'form-control form-inline','id'=>'actprotect_id','disabled'=>'disabled'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                         </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_protect->getAttributeLabel('amount')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_protect, 'amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'amount'])->label(false) ?>
                                              </div>
                                         </div>

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-add-protect">ตกลง</div>
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


        <div id="myModal-condition" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>เพิ่มเงื่อนไขความคุ้มครอง</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-condition']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_condition->getAttributeLabel('title_id')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_condition, 'title_id')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\ConditionTitle::asArrayObject(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'title_id',
                                                      'onchange'=>'
                                                         if($(this).val()==2){
                                                           $(".yesno").show();
                                                           $(".condition_text").hide();
                                                           is_yesno = 1;
                                                           
                                                         }else{
                                                           $(".yesno").hide();
                                                          $(".condition_text").show();
                                                          is_yesno = 0;
                                                         }
                                                         
                                                      '
                                                  ],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_condition->getAttributeLabel('condition_text')?></label>
                                              <div class="col-sm-9">
                                                 <div class="yesno" style="display:none;">
                                                   <?= Select2::widget([
                                                    'name'=>'yesno',
                                                    'id'=>'is_pic',
                                                    'data'=>ArrayHelper::map(\backend\helpers\YesNo::asArrayObject(),'id','name'),
                                                    'options'=>[],
                                                   ]);?>
                                                </div>
                                                <div class="condition_text">
                                                <?= $form->field($model_condition, 'condition_text')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'condition_text'])->label(false) ?>
                                              </div>
                                              </div>
                                         </div>

                                 

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-add-condition">ตกลง</div>
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


        <div id="myModal-copy-protect" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3><i class="fa fa-copy"></i> Copy <span id="title-text"></span></h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-copy-protect']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>บริษัทประกัน</th>
                                    <th>ชื่อแพ็กเก็จ</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php if(count($model_package)):?>
                                   <?php $i=0;?>
                                 <?php foreach($model_package as $value):?>
                                 <?php $i+=1;?>
                                 <tr class="<?=$value->id?>">
                                   <td><?=$i?></td>
                                   <td><?= \backend\models\Insurancecompany::getName($value->company_insure)?></td>
                                   <td><?=$value->name?></td>
                                   <td><div class="btn btn-primary btn-copy" onclick="copyProtect($(this));">Copy</div></td>
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
                        </div>

    <?php ActiveForm::end(); ?>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Close</button>
          </div> -->
          </div>
        </div>
        </div>


        <div id="myModal-copy-promotion" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3><i class="fa fa-gift text-success"></i> เลือกโปรโมชั่น <span id="title-text"></span></h3>
          </div>
          <div class="modal-body">
            
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th><input type="checkbox" id="promo_check_all" /></th>
                                    <th>รหัสโปรโมชั่น</th>
                                    <th>ชื่อโปรโมชั่น</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php if(count($model_promotion)>0):?>
                                   
                                 <?php foreach($model_promotion as $value):?>
                                 
                                 <tr class="<?=$value->id?>">
                                   <td><input type="checkbox" class="promo_id" id="<?=$value->id?>" /></td>
                                   <td><?= $value->code?></td>
                                   <td><?=$value->name?></td>
                                 </tr>

                               <?php endforeach;?>
                               <?php endif;?>
                                </tbody>
                              </table>
                              
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-add-promotion" data-dismiss="modal">ตกลง</button>
          </div>
          </div>
        </div>
        </div>
        

</div>
<?php
$this->registerJs('
    var protect_current_id = -1;
    var photo_current_id = -1;
    var protect_row_index = -1;
    var condition_row_index = -1;
    var is_yesno = 0;
    var copy_type = -1; // 1 ความคุ้มครอง , 2 เงื่อนไข
    var orderList = [];
    $(function(){
        
        $(".promo_id:checkbox").on("change",function(){
          var promid = $(this).attr("id");
          if($.inArray(promid,orderList)!= -1){
             orderList.splice(orderList.indexOf(promid));
             // alert(orderList);
          }else{
             orderList.push(promid);
             // alert(orderList);
          }
        });

        $(".btn-add-promotion").click(function(){
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "'.Url::toRoute(['/package/addpromotion'], true).'",
                data: {id: orderList},
                success: function(data){
                      //alert(data);return;
                          $(".add-promotion-body").append(data);              
                  }
            });
        });
        

        // $("#myModal-copy-promotion input").iCheck({
        //       checkboxClass: "icheckbox_square-green",
        //       radioClass: "iradio_square-green",
        //       increaseArea: "20%" // optional
        // });

       // $(".protect").hide();
        $(".btn-addprotect").on("click",function(e){
          e.preventDefault();
          protect_row_index = -1;
          $(":input","#form-protect")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
          $("#myModal").modal("show");
        });

        $(".btn-addcondition").on("click",function(e){
          e.preventDefault();
          $(":input","#form-condition")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
          $("#myModal-condition").modal("show");
        });

        $(".btn-addpromotion").on("click",function(e){
          e.preventDefault();
          $("#myModal-copy-promotion").modal("show");
        });
        
        $(".btn-copy-protect").click(function(){               // Copy ความคุ้มครอง
                     $(":input","#form-copy-protect")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
                    copy_type = 1;
                    $("#title-text").html("ความคุ้มครอง");
                    $("#myModal-copy-protect").modal("show");
                    //$("#form-commission").reset();
        });
        $(".btn-copy-condition").click(function(){               // Copy ความคุ้มครอง
                     $(":input","#form-copy-protect")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
                    copy_type = 2;
                    $("#title-text").html("เงื่อนไข");
                    $("#myModal-copy-protect").modal("show");
                    //$("#form-commission").reset();
        });

        $(".btn-add-protect").click(function(e){
          var type = $("#coverage_type").val();
          var detail = $("#actprotect_id").val();
          var detail_txts = $("#actprotect_id :selected").text();
          var amount = $("#amount").val();
          var protect_text = $("#coverage_type option:selected").text();
        
             if(protect_row_index > -1){
                  var row = $(".table-protect tbody").find("tr").eq(protect_row_index);
                         row.find(".coverage_type").val(type);
                         row.find("td:eq(1)").find(".coverage_txt").text(protect_text);
                         row.find(".actprotectid").val(detail);
                         row.find("td:eq(2)").find(".protect_txt").text(detail_txts);
                         row.find(".amount").val(amount);
                         row.find("td:eq(3)").find(".amount_txt").text(amount);

             }else{
                $.ajax({
                   type: "POST",
                   dataType: "html",
                  url: "'.Url::toRoute(['/package/addprotect'], true).'",
                  data: { txt: protect_text,id: type,desc: detail,amt: amount ,desc_txt: detail_txts},
                  success: function(data){
                    //alert(data);
                          $(".add-protect-body").parent().append(data);
                          var cnt =0;
                          $(".table-protect >tbody >tr").each(function(){
                            cnt +=1;
                            $(this).find("td:first-child").text(cnt);
                          });
                                         // totalall();
                        }
              });
             }
             
          $("#myModal").modal("hide");
        });

        $(".btn-add-condition").click(function(e){
          var type = $("#title_id").val();
          var detail = $("#condition_text").val();
          var yesnos = $("#is_pic :selected").text();
          var yesnos_val = $("#is_pic").val();
          var title_text = $("#title_id :selected").text();
     
            if(condition_row_index > -1){
              var row = $(".table-condition tbody").find("tr").eq(condition_row_index);
                         row.find(".conditionid").val(type);
                         row.find("td:eq(1)").find(".condition_txt").text(title_text);
                         if(is_yesno == 1){
                            row.find(".desc_condition").val(yesnos);
                            row.find("td:eq(2)").find(".desc_txt").text(yesnos);
                         }else{
                            row.find(".desc_condition").val(detail);
                            row.find("td:eq(2)").find(".desc_txt").text(detail);
                         }


            }else{
              $.ajax({
                   type: "POST",
                   dataType: "html",
                  url: "'.Url::toRoute(['/package/addcondition'], true).'",
                  data: { txt: title_text,id: type,desc: detail,yesno: yesnos },
                  success: function(data){
                   // alert(data);
                          $(".add-condition-body").parent().append(data);
                          var cnt =0;
                          $(".table-condition >tbody >tr").each(function(){
                            cnt +=1;
                            $(this).find("td:first-child").text(cnt);
                          });
                                         // totalall();
                        }
              });
            }
            
          $("#myModal-condition").modal("hide");
        });
        
    });
   function protectremove(e){
       swal({
              title: "ต้องการลบรายการนี้ใช่หรือไม่",
              text: "",
              type: "warning",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            }, function () {
              e.parents("tr").remove();
              swal.close();
                var cnt = 0;
                $(".table-protect >tbody >tr").each(function(){
                  cnt +=1;
                  e.find("td:first-child").text(cnt);

              });                
        });
     
   }
   function conditionremove(e){
      swal({
              title: "ต้องการลบรายการนี้ใช่หรือไม่",
              text: "",
              type: "warning",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            }, function () {
              e.parents("tr").remove();
              swal.close();
              var cnt = 0;
              $(".table-condition >tbody >tr").each(function(){
                cnt +=1;
                e.find("td:first-child").text(cnt);
              });             
        });
     
   }

   function protectEdit(e){

              var protect_id = e.closest("tr").find(".protectid").val();
              var protect = e.closest("tr").find(".actprotectid").val();
              var amount_txt = e.closest("tr").find(".amount_txt").text().trim();
              protect_row_index = e.parent().parent().index();

               protect_current_id = protect;

               $("#coverage_type").val(protect_id).trigger("change");
               $("#actprotect_id").val(protect).trigger("change");
               $("#amount").val(amount_txt);
              
              $("#myModal").modal("show");

            }
           function conditionEdit(e){

              var condition_id = e.closest("tr").find(".conditionid").val();
              var condition_text = e.closest("tr").find(".desc_condition").val();

              condition_row_index = e.parent().parent().index();

               $("#title_id").val(condition_id).trigger("change");
               $("#condition_text").val(condition_text);
             
               if(condition_id == 2){
                if(condition_text == "No"){
                     
                }else{
                     photo_current_id = 1;
                      $("#is_pic").val(photo_current_id).trigger("change");
                       $("#condition_text").val("");
                }
               
               }
               $("#myModal-condition").modal("show");

            }

            function copyProtect(e){
              var comid = e.parent().parent().attr("class");
            //  alert(comid);
              swal({
                      title: "ต้องการ Copy ความคุ้มครองจากบริษัทประกันนี้ใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }, function () {
                      $.ajax({
                          type: "POST",
                          dataType: "html",
                          url: "'.Url::toRoute(['/package/copyprotect'], true).'",
                          data: {id: comid,type:copy_type},
                          success: function(data){
                            swal.close();
                            //alert(data);return;
                                  if(copy_type == 1){
                                        $(".add-protect-body").append(data);
                                  }else{
                                        $(".add-condition-body").append(data);
                                  }
                               
                                }
                      });
                      $("#myModal-copy-protect").modal("hide");         
              });
             
            }

            function promotionremove(e){
              var ids = e.closest("tr").find(".promot_id").val();
              var pkid = "'.$model->id.'";
              if(ids > 0){
                swal({
                      title: "ต้องการลบข้อมูลใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }, function () {
                      $.ajax({
                          type: "POST",
                          dataType: "html",
                          url: "'.Url::toRoute(['/package/removepromotion'], true).'",
                          data: {id: ids,packid: pkid},
                          success: function(data){
                            swal.close();
                           // alert(data);return;
                            if(data > 0){
                              e.parent().parent().remove();
                            }
                         }
                      });
                             
                });
              }
            }

  ',static::POS_END);
 ?>
