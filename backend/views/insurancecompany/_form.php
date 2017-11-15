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
use kartik\file\FileInput;

use wbraganca\dynamicform\DynamicFormWidget;

use backend\models\Carbrand;
use backend\models\Carinfo;

$brand = Carbrand::find()->where(['status'=>1])->all();
$carinfo = Carinfo::find()->where(['status'=>1])->all();

/* @var $this yii\web\View */
/* @var $model backend\models\Insurancecompany */
/* @var $form yii\widgets\ActiveForm */

?>
<?php $this->registerJsFile(Yii::$app->getUrlManager()->getBaseUrl().'/js/dynamicsform.js?Ver=0004',['depends'=>[\yii\web\JqueryAsset::className()], 'position'=> \yii\web\View::POS_END]); ?>
<div class="insurancecompany-form">
    <?php $session = Yii::$app->session;
      if ($session->getFlash('msg')): ?>
      
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
    <?php $form = ActiveForm::begin(['id'=>'dynamic-form','options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                  <div class="col-lg-6">
                    <div class="form-inline">
                        <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>     
                </div>
                  </div>
                </div><br />
    <div class="row">
      <div class="col-lg-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลบริษัทประกัน</a></li>
              <li><a href="#tab_2" data-toggle="tab">กลุ่มรถ</a></li>
              <!-- <li><a href="#tab_3" data-toggle="tab">ช่วงทุนรถ</a></li> -->
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel">
          
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
                                                <?= $form->field($model, 'reg_capital')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'reg_capital','value'=>number_format($model->reg_capital)])->label(false) ?>
                                              </div>
                                         </div>
                                                 <div class="form-group">
                                              <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('credit_limit')?></label>
                                              <div class="col-sm-10">
                                                <?= $form->field($model, 'credit_limit')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'credit_limit','value'=>number_format($model->credit_limit)])->label(false) ?>
                                              </div>
                                         </div>

                                         <div class="form-group">
                                              <label class="control-label col-sm-2" for="dealer" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('dealer_id')?></label>
                                              <div class="col-sm-10">
                                                <?= $form->field($model, 'dealer_id')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'dealer_id'])->label(false) ?>
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
                                                 <input type="hidden" name="old_logo" value="<?=$model->logo?>" />
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
                                              <?= Html::img('@web/uploads/logo/'.Bank::getLogo($value->bank_id),['class'=>'bank_logo','style'=>'width: 100%;']);?>
                                              <input type="hidden" class="bank_id" name="bank_id[]" value="<?= $value->bank_id;?>"/>
                                            </td>
                                            <td>
                                              <div class="bank_name_txt">
                                              <?= Bank::getBankName($value->bank_id);?>
                                            </div>
                                            </td>
                                            
                                            <td>
                                              <div class="bank_short_name_txt">
                                              <?= Bank::getBankshortname($value->bank_id);?>
                                              </div>
                                            </td>
                                           <td>
                                            <div class="account_no_txt">
                                            <?= $value->account_no;?>
                                          </div>
                                            <input type="hidden" class="account_no"  name="account_no[]" value="<?= $value->account_no;?>"/>
                                          </td>
                                           <td>
                                            <div class="brance_txt">
                                            <?= $value->brance;?>
                                          </div>
                                            <input type="hidden" class="brance" name="brance[]" value="<?= $value->brance;?>"/>
                                          </td>
                                           <td>
                                            <div class="account_type_txt">
                                            <?= BankAccountType::getTypeById($value->account_type);?>
                                          </div>
                                            <input type="hidden" class="account_type" name="account_type[]" value="<?= $value->account_type;?>"/>
                                          </td>
                                            
                                          <td class="action">
                                              <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
                                              <a class="btn btn-white remove-line" onClick="bankRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                              <a class="btn btn-white edit-line" onClick="bankEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
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
                                               
                                               <th>รหัสผลิตภัณฑ์</th>
                                               <th>ชื่อโปรโมชั่น</th>
                                               <th>คอมฯ(%)</th>
                                               <th>คอมฯ(บาท)</th>
                                               <th></th>
                                             </tr>
                                            </thead>
                                             <tbody class="add-commission-body">
                                              <?php if(!$model->isNewRecord):?>
                                                  <?php foreach($model_commissiondata as $value):?>
                                                    <tr id="shop-bank-id">
                                                      <td>
                                                        <div class="insure_txt">
                                                        <?= Product::getProdcode($value->insure_type)." ".Product::getProdname($value->insure_type);?>
                                                      </div>
                                                        <input type="hidden" class="insure_type" name="insure_type[]" value="<?= $value->insure_type;?>"/>
                                                        <input type="hidden" class="commission_id" name="commission_id[]" value="<?= $value->insure_type;?>"/>
                                                      </td>
                                                     <td>
                                                      <div class="promotion_txt">
                                                      <?= $value->promotion_name;?>
                                                    </div>
                                                      <input type="hidden" class="promotion" id="promotion" name="promotion[]" value="<?= $value->promotion_name;?>"/>
                                                    </td>
                                                     <td>
                                                      <div class="disc_per_txt">
                                                      <?= $value->commission_percent;?>
                                                    </div>
                                                      <input type="hidden" class="commission_per" name="commission_per[]" value="<?= $value->commission_percent;?>"/>
                                                    </td>
                                                     <td>
                                                      <div class="amount_txt">
                                                      <?= $value->commission_amont;?>
                                                    </div>
                                                      <input type="hidden" class="commission_amount" name="commission_amount[]" value="<?= $value->commission_amont;?>"/>
                                                    </td>
                                                      
                                                    <td class="action">
                                                        <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
                                                        <a class="btn btn-white remove-line" onClick="commissionRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                         <a class="btn btn-white edit-line" onClick="commissionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                                                      </td>
                                                  </tr>
                                                  <?php endforeach;?>
                                               <?php endif;?>
                                             </tbody>
                                           </table>
                                      </div>
                                      <div class="panel-footer">
                             <div class="btn btn-primary btn-add-commission">เพิ่มคอมมิชชั่น</div>
                             <div class="btn btn-default btn-copy-commission"><i class="fa fa-copy"></i> Copy คอมมิชชั่น</div>
                          </div>
                                    </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    ข้อมูลผู้ติดต่อ
                                </div>
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                     <table class="table table-striped table-hover table-contact">
                                      <thead>
                                        <tr>
                                         
                                         <th>ชื่อหน่วยงาน</th>
                                         <th>คำนำหน้า</th>
                                         <th>ชื่อผู้ติดต่อ</th>
                                         <th>เบอร์โทร 1</th>
                                         <th>อีเมล์ 1</th>
                                         <th></th>
                                       </tr>
                                      </thead>
                                       <tbody class="add-contact-body">
                                         <?php if(!$model->isNewRecord):?>
                                            <?php foreach($model_contactdata as $value):?>
                                              <tr id="shop-bank-id">
                                                
                                                <td>
                                                  <div class="section_txt">
                                                  <?=$value->contact_section;?>
                                                  </div>
                                                  <input type="hidden" class="contact_section" name="contact_section[]" value="<?= $value->contact_section;?>"/>
                                                  <input type="hidden" class="id" name="id[]" value="<?= $value->id;?>"/>
                                                </td>
                                                <td><div class="title_txt">
                                                  <?= \backend\helpers\Prefixname::getTypeById($value->contact_title);?>
                                                </div>
                                                  <input type="hidden" class="contact_title" name="contact_title[]" value="<?= $value->contact_title;?>"/>
                                                </td>
                                                
                                                <td>
                                                  <div class="name_txt">
                                                  <?= $value->name;?>
                                                </div>
                                                   <input type="hidden" class="contact_name" name="name[]" value="<?= $value->name;?>"/>
                                                </td>
                                                 <td>
                                                  <div class="phone1_txt">
                                                  <?= $value->phone1;?>
                                                </div>
                                                   <input type="hidden" class="phone1" name="phone1[]" value="<?= $value->phone1;?>"/>
                                                   <input type="hidden" class="phone2" name="phone2[]" value="<?= $value->phone2;?>"/>
                                                </td>
                                                <td>
                                                  <div class="email1_txt">
                                                  <?= $value->email1;?>
                                                </div>
                                                   <input type="hidden" class="email1" name="email1[]" value="<?= $value->email1;?>"/>
                                                   <input type="hidden" class="email2" name="email2[]" value="<?= $value->email2;?>"/>
                                                </td>
                                                 
                                                
                                               <!-- <td>
                                                <div class="type_txt">
                                                <?php //echo \backend\helpers\ContactType::getTypeById($value->contact_type_id);?>
                                              </div>
                                                <input type="hidden" class="contact_type_id" name="contact_type_id[]" value="<?= $value->contact_type_id;?>"/>
                                              </td>
                                               <td>
                                                <div class="text_txt">
                                                <?= $value->contact_txt;?>
                                              </div>
                                                <input type="hidden" class="contact_txt" name="contact_txt[]" value="<?= $value->contact_txt;?>"/>
                                              </td> -->
                                               
                                              <td class="action">
                                                  <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
                                                  <a class="btn btn-white remove-line" onClick="contactRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                  <a class="btn btn-white edit-line" onClick="contactEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
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
                                   <div class="btn btn-primary btn-add-contact">เพิ่มผู้ติดต่อ</div>
                                </div>
                              </div>
                            </div> 
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-lg-2">
                                         <?php echo "<h5>ประเภทไฟล์</h5>";?>
                                        <?= $form->field($modelfile, 'filecategory')->widget(Select2::className(),
                                                [
                                                 'data'=> ArrayHelper::map(\backend\helpers\FileCategory::asArrayObject(),'id','name'),
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
                                          <td><?= \backend\helpers\FileCategory::getTypeById($value->doc_group_id)?></td>
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
              <div class="tab-pane" id="tab_2">
                <div class="row">
                  <div class="col-lg-12">
                     <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                               #
                            </th>
                             <th>
                               ชื่อกลุ่ม
                            </th>
                             <th>
                               รายละเอียด
                            </th>
                             <th>
                               
                            </th>
                          </tr>
                        </thead>
                        <tbody class="car-group-list">
                          <?php if(!$model->isNewRecord):?>
                          <?php $i=0;?>
                            <?php foreach ($model_cargroup_detail as $value):?>
                            <?php $i+=1;?>
                            <tr>
                             <td> 
                              <div class="id_text">
                                <?=$i;?> 
                              </div>
                              <input type="hidden" name="recid" class="recid" value="<?=$value->id?>" />
                             </td>
                             <td>
                                 <div class="name_text">
                                  <?=$value->name?>
                                </div>
                                </td> 
                              <td>
                                <div class="desc_text">
                                   <?=$value->description?>
                                 </div>
                              </td> 
                              <td>
                                <a class="btn btn-white remove-line" onClick="cargroupRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-white edit-line" onClick="cargroupEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
                              </td> 
                            </tr>
                           <?php endforeach;?>
                          <?php endif;?>
                        </tbody>
                     </table>
                     <div class="btn btn-primary btn-car-group">เพิ่มรายการ</div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab_3">
                
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="btn btn-primary btn-upload-cap"><i class="fa fa-download"></i> อัพโหลดข้อมูล</div>
                    </div>
                  </div>
              </div>
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
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_commission->getAttributeLabel('insure_type')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_commission, 'insure_type')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\models\Product::find()->all(),'id',function($data){
                                                      return $data->product_code." ".$data->name;
                                                   }),
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

        <div id="myModal-contact" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>เพิ่มรายชื่อผู้ติดต่อ</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-contact']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">
                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('contact_section')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'contact_section')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'contact_section'])->label(false) ?>
                                              </div>
                                         </div>
                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('contact_title')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'contact_title')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\Prefixname::asArrayObject(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'contact_title'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>
                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('name')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'contact_name'])->label(false) ?>
                                              </div>
                                         </div>
                                          <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('phone1')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'phone1')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'phone1'])->label(false) ?>
                                              </div>
                                         </div>
                                          <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('phone2')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'phone2')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'phone2'])->label(false) ?>
                                              </div>
                                         </div>
                                          <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('email1')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'email1')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'email1'])->label(false) ?>
                                              </div>
                                         </div>
                                          <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_contact->getAttributeLabel('email2')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_contact, 'email2')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'email2'])->label(false) ?>
                                              </div>
                                         </div>

                                  
                                         

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-addcontact">ตกลง</div>
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

        <div id="myModal-copy-commission" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3><i class="fa fa-copy"></i> Copy ค่าคอมมิชชั่น</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-copy-commission']); ?>
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
                                    <th>ชื่อย่อ</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php if(count($model_company_com)):?>
                                   <?php $i=0;?>
                                 <?php foreach($model_company_com as $value):?>
                                 <?php $i+=1;?>
                                 <tr class="<?=$value->insure_company_id?>">
                                   <td><?=$i?></td>
                                   <td><?=$value->name?></td>
                                   <td><?=$value->short_name?></td>
                                   <td><div class="btn btn-primary btn-copy" onclick="copycom($(this));">Copy</div></td>
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


        <div id="myModal-car-group" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3><i class="fa fa-car"></i> กลุ่มรถยนต์</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-car-group']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-8">
                              <?=$form->field($model_cargroup,"name")->textInput(['id'=>'cargroup-name']);?>
                              <?=$form->field($model_cargroup,"description")->textarea(['id'=>'cargroup-desc']);?>
                              </div>
                              <div class="col-lg-2">
                                
                            </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-8">
                                          <p>ยี่ห้อ</p>
                                          <?=Select2::widget([
                                          'name' => 'kv-state-230',
                                          'data' => ArrayHelper::map($brand,'id','name'),
                                          'size' => Select2::SMALL,
                                          'options' => ['placeholder' => 'Select a state ...','class'=>'form-control','id'=>'carbrand',
                                             'onchange'=>'
                                                  $.post("index.php?r=insurancecompany/showcarmodel&id="+$(this).val(),function(data){
                                                      $("select#carmodel").html(data);
                                                  });
                                             '],
                                          'pluginOptions' => [
                                              'allowClear' => true
                                          ],
                                      ])
                                     ?>
                                </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-8">
                                          <p>รุ่น</p>
                                          <?=Select2::widget([
                                          'name' => 'kv-state-230',
                                          'data' => ArrayHelper::map($carinfo,'id','model'),
                                          'size' => Select2::SMALL,
                                          'options' => ['placeholder' => 'Select a state ...','multiple'=>true,'class'=>'form-control','id'=>'carmodel'],
                                          'pluginOptions' => [
                                              'allowClear' => true
                                          ],
                                      ])
                                     ?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8"><br />
                                  <div class="btn btn-success btn-add-carlist"><i class="fa fa-plus"></i></div>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-lg-12">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>#
                                        </th>
                                         <th>
                                          ยี่ห้อ
                                        </th>
                                         <th>
                                          รุ่น
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody class="add-cargroup-body">
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
          <div class="modal-footer">
            <button class="btn btn-save-cargroup" data-dismiss="modal">บันทึก</button>
          </div>
          </div>
        </div>
        </div>

        
<?php 
        $this->registerJs('

            var contact_row_index = -1;
            var bank_row_index = -1;
            var commission_row_index = -1;
            $(function(){
                  $(".btn-add-bank").click(function(){
                    $("#myModal").modal("show");
                   // $("#form-bank").reset();
                  });

                  $(".btn-add-commission").click(function(){
                    commission_row_index = -1;
                     $(":input","#form-commission")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
                    $("#myModal-commission").modal("show");
                    //$("#form-commission").reset();
                  });

                  $(".btn-copy-commission").click(function(){
                     $(":input","#form-copy-commission")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
                    $("#myModal-copy-commission").modal("show");
                    //$("#form-commission").reset();
                  });

                  $(".btn-add-contact").on("click",function(){
                     contact_row_index = -1;
                      $(":input","#form-contact")
                      .not(":button, :submit, :reset, :hidden")
                      .val("")
                      .removeAttr("checked")
                      .removeAttr("selected");
                    $("#myModal-contact").modal("show");
                  });

                  $(".btn-addbank").click(function(e){
                  var type = $("#bank_id").val();
                  var bankname = $("#bank_id :selected").text();
                  var account_no = $("#account_no").val();
                  var brances = $("#brance").val();
                  var bank_text = $("#bank_id option:selected").text();
                  var accounttype = $("#account_type").val();
                  var accounttype_text = $("#account_type :selected").text();

                  if(bank_row_index > -1){

                         var row = $(".table-bank tbody").find("tr").eq(bank_row_index);
                         row.find(".bank_id").val(type);
                         row.find("td:eq(1)").find(".bank_name_txt").text(bankname);
                        
                         row.find(".account_no").val(account_no);
                         row.find("td:eq(3)").find(".account_no_txt").text(account_no);
                         row.find(".brance").val(brances);
                         row.find("td:eq(4)").find(".brance_txt").text(brances);
                         row.find(".account_type").val(accounttype);
                         row.find("td:eq(5)").find(".account_type_txt").text(accounttype_text);


                         $.ajax({
                           type: "POST",
                           dataType: "json",
                          url: "'.Url::toRoute(['/insurancecompany/findbankdata'], true).'",
                          data: { id: type},
                          success: function(data){
                           // alert(data["short_name"]);return;
                                var imgpath = "http://localhost:81/deena/backend/web/uploads/logo/"+data["logo"];
                                    row.find("td:eq(0)").find(".bank_logo").attr("src",imgpath);
                                    row.find(".short_name").val(data["short_name"]);
                                    row.find("td:eq(2)").find(".bank_short_name_txt").text(data["short_name"]);
                                }
                      });
                       
                         bank_row_index = -1;
                  }else{
                     $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addbank'], true).'",
                          data: { txt: bank_text,id: type,account: account_no,brance: brances,account_type: accounttype},
                          success: function(data){
                           // alert(data);
                                  $(".add-bank-body").append(data);
                                }
                      });
                  }
                 
                   
                  $(":input","#form-bank")
                  .not(":button, :submit, :reset, :hidden")
                  .val("")
                  .removeAttr("checked")
                  .removeAttr("selected");
                  $("#myModal").modal("hide");
                });

                 $(".btn-addcommission").click(function(e){
                  var type = $("#insure_type").val();
                  var insuretxt = $("#insure_type :selected").text();
                  var promotions = $("#promotion_name").val();
                  var desper = $("#commission_percent").val();
                  var insure_text = $("#insure_type option:selected").text();
                  var amt = $("#commission_amont").val();
                    if(commission_row_index > -1){
                        var row = $(".table-commission tbody").find("tr").eq(commission_row_index);
                         row.find(".commission_id").val(type);
                         row.find("td:eq(0)").find(".insure_txt").text(insuretxt);
                         row.find(".promotion").val(promotions);
                         row.find("td:eq(1)").find(".promotion_txt").text(promotions);
                         row.find(".commission_per").val(desper);
                         row.find("td:eq(2)").find(".disc_per_txt").text(desper);
                         row.find(".commission_amount").val(amt);
                         row.find("td:eq(3)").find(".amount_txt").text(amt);
                         commission_row_index = -1;
                    }else{
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
                    }
                    
                  $(":input","#form-commission")
                  .not(":button, :submit, :reset, :hidden")
                  .val("")
                  .removeAttr("checked")
                  .removeAttr("selected");
                  $("#myModal-commission").modal("hide");
                });

                $(".btn-addcontact").click(function(e){
                  var sections = $("#contact_section").val();
                  var titles = $("#contact_title").val();
                  var title_names = $("#contact_title :selected").text();
                  var names = $("#contact_name").val();
                  var types = $("#contact_type_id").val();
                  var txts = $("#contact_txt").val();
                  var phone1 = $("#phone1").val();
                  var phone2 = $("#phone2").val();
                  var email1 = $("#email1").val();
                  var email2 = $("#email2").val();
                    
                     if(contact_row_index > -1){
                         var row = $(".table-contact tbody").find("tr").eq(contact_row_index);
                         row.find(".contact_section").val(sections);
                         row.find("td:eq(0)").find(".section_txt").text(sections);
                         row.find(".contact_title").val(titles);
                         row.find("td:eq(1)").find(".title_txt").text($("#contact_title :selected").text());
                         row.find(".name").val(names);
                         row.find("td:eq(2)").find(".name_txt").text(names);
                         row.find(".contact_type_id").val(types);
                         row.find("td:eq(3)").find(".phone1_txt").text(phone1);
                         row.find(".phone1").val(phone1);
                         row.find(".phone2").val(phone2);
                         row.find("td:eq(4)").find(".email1_txt").text(email1);
                         row.find(".email1").val(email1);
                         row.find(".email2").val(email2);
                         contact_row_index = -1;
                     }else{
                           $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addcontact'], true).'",
                          data: { section: sections,title: titles,name: names,type: types,txt: txts,title_name: title_names,phones1:phone1,phones2:phone2,emails1:email1,emails2:email2},
                          success: function(data){
                           // alert(contact_row_index);
                                 $(".add-contact-body").append(data);
                                }
                      });
                     }
                    
                
                   
                  $(":input","#form-contact")
                  .not(":button, :submit, :reset, :hidden")
                  .val("")
                  .removeAttr("checked")
                  .removeAttr("selected");
                  $("#myModal-contact").modal("hide");
                });


                 $(".btn-car-group").click(function(){
                    $("#myModal-car-group").modal("show");
                 });

                  $(".btn-add-car").click(function(){
                     $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addcar'], true).'",
                          data: { id:1},
                          success: function(data){
                            //alert(data);
                                  $(".add-car-body").append(data);
                                }
                      });
                  });

                  $(".btn-save-cargroup").click(function(){
                    var recid = "'.$model->id.'";
                    var cargroup_name = $("#cargroup-name").val();
                    var cargroup_desc = $("#cargroup-desc").val();
                    if(recid != ""){
                      $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addcargroup'], true).'",
                          data: {id: recid,gname: cargroup_name,gdesc: cargroup_desc},
                          success: function(data){
                            //alert(data);
                                  $(".car-group-list").empty();
                                  $(".car-group-list").append(data);
                                }
                      });
                    }
                    

                  });

                  $(".btn-add-carlist").click(function(){
                     var brands = $("#carbrand :selected").val();
                     var carlists = $("#carmodel").val();

                     $.ajax({
                          type: "POST",
                          dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/addcarlist'], true).'",
                          data: {brand: brands,carlist: carlists},
                          success: function(data){
                            //alert(data);
                               //   $(".add-car-body").empty();
                                  $(".add-cargroup-body").append(data);
                                 //$("#carbrand option:selected").remove();
                                 $("#carbrand").prop("selectedIndex", -1);
                                  $("#carmodel").empty();
                                }
                      });
                  });

                  $(".btn-upload-cap").click(function(){
                    $("#myModal-import-cap").modal("show");
                  });
              

            });
            function bankRemove(e){
              swal({
                      title: "ต้องการลบข้อมูลใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }, function () {
                      e.parents("tr").remove();
                             
                });
              // if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
              //     e.parents("tr").remove();
              // }
            }
             function commissionRemove(e){
              swal({
                      title: "ต้องการลบข้อมูลใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }, function () {
                      e.parents("tr").remove();
                             
                });
              // if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
              //     e.parents("tr").remove();
              // }
            }
            function contactRemove(e){
              swal({
                      title: "ต้องการลบข้อมูลใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }, function () {
                      e.parents("tr").remove();
                             
                });
              // if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
              //     e.parents("tr").remove();
              // }
            }
            function contactEdit(e){
              var section = e.closest("tr").find(".contact_section").val();
              var title = e.closest("tr").find(".contact_title").val();
              var name = e.closest("tr").find(".contact_name                                                                                                                                                                      ").val();
              var type = e.closest("tr").find(".contact_type_id").val();
              var txt = e.closest("tr").find(".contact_txt").val();

              var phone1 = e.closest("tr").find(".phone1").val();
              var phone2 = e.closest("tr").find(".phone2").val();
              var email1 = e.closest("tr").find(".email1").val();
              var email2 = e.closest("tr").find(".email2").val();

              contact_row_index = e.parent().parent().index();
          
               $("#contact_section").val(section);
               $("select#contact_title").val(title).trigger("change");
               $("#contact_name").val(name);
               $("#contact_type_id").val(type).trigger("change");
               $("#contact_txt").val(txt);
               $("#phone1").val(phone1);
               $("#phone2").val(phone2);
               $("#email1").val(email1);
               $("#email2").val(email2);

              $("#myModal-contact").modal("show");

            }

            function bankEdit(e){

              var bankid = e.closest("tr").find(".bank_id").val();
              var accountno = e.closest("tr").find(".account_no").val();
              var brance = e.closest("tr").find(".brance").val();
              var type = e.closest("tr").find(".account_type").val();
              bank_row_index = e.parent().parent().index();

               $("#bank_id").val(bankid).trigger("change");
               $("#account_no").val(accountno);
               $("#brance").val(brance);
               $("#account_type").val(type).trigger("change");
               // $("#contact_txt").val(txt);

              $("#myModal").modal("show");

            }

            function commissionEdit(e){

              var comid = e.closest("tr").find(".commission_id").val();
              var promotion = e.closest("tr").find(".promotion").val();
              var commission_per = e.closest("tr").find(".commission_per").val();
              var commission_amount = e.closest("tr").find(".commission_amount").val();
              commission_row_index = e.parent().parent().index();

             // alert(commission_amount);
               $("#insure_type").val(comid).trigger("change");
               $("#promotion_name").val(promotion);
               $("#commission_percent").val(commission_per);
               $("#commission_amont").val(commission_amount);
               // $("#contact_txt").val(txt);

              $("#myModal-commission").modal("show");

            }

            function removeDocref(e){
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
                          url: "'.Url::toRoute(['/insurancecompany/removedoc'], true).'",
                          data: {id: recid},
                          success: function(data){
                           // alert(data);
                                  $(".docuref").empty();
                                  $(".docuref").append(data);
                                }
                  });
                             
                });
              
            }

            function copycom(e){
              var comid = e.parent().parent().attr("class");

              swal({
                      title: "ต้องการ Copy ค่าคอมมิชชั่นจากบริษัทประกันนี้ใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }, function () {
                      $.ajax({
                          type: "POST",
                          dataType: "html",
                          url: "'.Url::toRoute(['/insurancecompany/copycommission'], true).'",
                          data: {id: comid},
                          success: function(data){
                            //alert(data);return;
                                 $(".add-commission-body").append(data);
                                }
                      });
                      $("#myModal-copy-commission").modal("hide");
                             
                });

            }

            function cargroupRemove(e){
              var recid = e.closest("tr").find(".recid").val() ;
              var comids = "'.$model->id.'";

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
                          async: "true",
                          url: "'.Url::toRoute(['/insurancecompany/removecargroup'], true).'",
                          data: {id: recid,comid: comids},
                          success: function(data){
                           // alert(data);

                                  $(".car-group-list").empty();
                                  swal.close();
                                  $(".car-group-list").append(data);
                                }
                  });
                             
                });
              
            }
            function cargroupEdit(e){

              var name = e.closest("tr").find(".name_text").text();
              var desc = e.closest("tr").find(".desc_text").text();
              
               $("#cargroup-name").val($.trim(name));
               $("#cargroup-desc").val($.trim(desc));
              
              $("#myModal-car-group").modal("show");

            }

            function carlistRemove(e){
              alert();
            }
            function carlistEdit(e){
              var a = 1;
              $("select#carmodel option[value=a]").attr("selected","selected");
            }

',static::POS_END);
    ?>
