<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use toxor88\switchery\Switchery;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\helpers\Prefixname;
use yii\helpers\Url;
use backend\models\Bank;
use backend\helpers\BankAccountType;
use kartik\file\Fileinput;
use common\models\Province;
use common\models\Amphur;
use common\models\District;
/* @var $this yii\web\View */
/* @var $model backend\models\Insurance */
/* @var $form yii\widgets\ActiveForm */

$prov = Province::find()->all();
$amp = Amphur::find()->all();
$dist = District::find()->all();

/* @var $this yii\web\View */
/* @var $model backend\models\Member */
/* @var $form yii\widgets\ActiveForm */
$level = \backend\models\Memberlevel::find()->where(['status'=>1])->all();
$line = \backend\models\Line::find()->where(['status'=>1])->all();
$intro = \backend\models\Introduce::find()->where(['status'=>1])->all();
$prefix = \backend\models\Prefixname::find()->where(['status'=>1])->all();
$isinto = $model->is_into;
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('member_code')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'member_code')->textInput(['maxlength' => true,'class'=>'form-control form-inline','readonly'=>'readonly','value'=>$model->isNewRecord?$runno:$model->member_code])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('line_code')?></label>
                                <div class="col-sm-9">
                                   <?= $form->field($model, 'line_code')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($line,'id', function($data){
                                        return $data->line_code. " [ ".$data->name." ] ";
                                     }),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'line_code'],
                                    ]

                                  )->label(false) ?>   
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('level_id')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'level_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($level,'id','level'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'level'],
                                    ]

                                  )->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('applied_date')?></label>
                                <div class="col-sm-9">
                                  <?php
                                     if($model->isNewRecord){
                                        $model->applied_date=date("d-m-Y");
                                        $partofdate = explode('-', $model->applied_date);
                                        $model->expired_date = $partofdate[0]."-".$partofdate[1].'-'.intval($partofdate[2] + 1) ;
                                      }else{
                                        $model->applied_date = date("d-m-Y",$model->applied_date);
                                      }?>
                                  <?= $form->field($model, 'applied_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%',
                                           'onchange'=>'
                                              var partofdate = $(this).val().split("-");
                                              var newyear = parseInt(parseInt(partofdate[2]) + 1);
                                              var newdate = partofdate[0]+"-"+partofdate[1]+"-"+newyear;
                                              $("#expired_date").val(newdate).trigger("change");
                                            '
                                      ]])->label(false)
                                  ?>
                                </div>
                           </div>

                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('first_name')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('dob')?></label>
                                <div class="col-sm-9">
                                   <?php if(!$model->isNewRecord){
                                     $model->dob = date("d-m-Y",$model->dob);
                                  }?>
                                  <?= $form->field($model, 'dob')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%',
                                           ]])->label(false)
                                  ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('phone')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('mobile')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('line')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'line')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           
                          
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('card_into')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'card_into')->textInput(['maxlength' => true,'class'=>'form-control form-inline','readonly'=>'readonly',"id"=>'card_into'])->label(false) ?>
                                </div>
                           </div>
                           
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('income_expect')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'income_expect')->textInput(['maxlength' => true,'class'=>'form-control form-inline','value'=>number_format($model->income_expect)])->label(false) ?>
                                </div>
                           </div>
                           
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-9">
                                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                                </div>
                           </div>

                           

                        </div>
                        <div class="col-lg-6">
                          
                           
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('member_into')?></label>
                                <div class="col-sm-9">
                                    <?= $form->field($model, 'member_into')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\models\Member::find()->where(['status'=>1])->all(),'id', function($data){
                                        return $data->member_code. " [ ".$data->first_name." ".$data->last_name ." ] ";
                                     }),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'member_into'],
                                    ]

                                  )->label(false) ?>   
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('intro_code')?></label>
                                <div class="col-sm-9">
                                    <?= $form->field($model, 'intro_code')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($intro,'id', function($data){
                                        return $data->intro_code. " [ ".$data->name." ] ";
                                     }),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'intro_code'],
                                    ]

                                  )->label(false) ?>   
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('title_name')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'title_name')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($prefix,'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'position'],
                                    ]

                                  )->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('last_name')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'last_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('card_id')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'card_id')->textInput(['maxlength' => 13,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('email')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('career')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'career')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           
                           

                             
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('expired_date')?></label>
                                <div class="col-sm-9">
                                  <?php if(!$model->isNewRecord){
                                     $model->expired_date = date("d-m-Y",$model->expired_date);
                                  }?>
                                 <?= $form->field($model, 'expired_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%','id'=>'expired_date']])->label(false)
                                  ?>
                                </div>
                           </div>
                           
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('is_into')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'is_into')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\helpers\YesNo::asArrayObject(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'is_into',
                                        'onchange'=>' //alert($(this).val());
                                            if($(this).val()==1){
                                              $("#card_into_expired").removeAttr("readonly");
                                              $("#card_into").removeAttr("readonly");
                                              //$("#bank_account").removeAttr("readonly");
                                            }else{
                                               $("#card_into_expired").attr("readonly","readonly");
                                               $("#card_into").attr("readonly","readonly");
                                              //$("#bank_account").attr("readonly","readonly");
                                            }
                                        '
                                     ],
                                    ]

                                  )->label(false) ?>
                                </div>
                           </div>
                           
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('card_into_expired')?></label>
                                <div class="col-sm-9">
                                   <?php if(!$model->isNewRecord){
                                     $model->card_into_expired = date("d-m-Y",$model->card_into_expired);
                                  }?>
                                  <?= $form->field($model, 'card_into_expired')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%','id'=>'card_into_expired','readonly'=>'readonly']])->label(false)
                                  ?>
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

           <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    ข้อมูลที่อยู่
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('address')?></label>
                                <div class="col-sm-6">
                                  <?= $form->field($model, 'address')->textarea(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('province')?></label>
                                <div class="col-sm-6">
                                 <?= $form->field($model, 'province')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($prov,'PROVINCE_ID','PROVINCE_NAME'),
                                    'options'=>['placeholder'=>'เลือกจังหวัด','maxlength' => true,'class'=>'form-control form-inline','id'=>'province',
                                       'onchange'=>'
                                          $.post("index.php?r=member/showcity&id=' . '"+$(this).val(),function(data){
                                          $("select#city").html(data);
                                          $("select#city").prop("disabled","");

                                        });
                                       '
                                    ],
                                    ]

                                  )->label(false) ?>

                                </div>
                           </div>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('amphur')?></label>
                                <div class="col-sm-6">
                                 <?= $form->field($model, 'amphur')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($amp,'AMPHUR_ID','AMPHUR_NAME'),
                                    'options'=>['placeholder'=>'เลือกอำเภอ','maxlength' => true,'class'=>'form-control form-inline','id'=>'city','disabled'=>'disabled',
                                          'onchange'=>'
                                          $.post("index.php?r=member/showdistrict&id=' . '"+$(this).val(),function(data){
                                          $("select#district").html(data);
                                          $("select#district").prop("disabled","");

                                        });
                                        $.post("index.php?r=member/showzipcode&id=' . '"+$(this).val(),function(data){
                                          $("#zipcode").val(data);
                                          $("#zipcode").prop("disabled","");

                                        });
                                       '
                                    ],
                                    ]

                                  )->label(false) ?>   

                                </div>
                           </div>

                          </div>
                        </div>

                           <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('district')?></label>
                                <div class="col-sm-6">
                                 <?= $form->field($model, 'district')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($dist,'DISTRICT_ID','DISTRICT_NAME'),
                                    'options'=>['placeholder'=>'เลือกตำบล','maxlength' => true,'class'=>'form-control form-inline','id'=>'district','disabled'=>'disabled'],
                                    ]

                                  )->label(false) ?> 
                                </div>
                           </div>
                            </div>
                           </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('zipcode')?></label>
                                <div class="col-sm-6">
                                 <?= $form->field($model, 'zipcode')->textInput(['id'=>'zipcode','class'=>'form-control','disabled'=>'disabled'])->label(false) ?> 
                                </div>
                           </div>
                            </div>
                          </div>

                           
                    </div>
                    <div class="col-lg-6">
                      
                 
                                  <?php echo $form->field($model, 'photo')->fileInput()->label() ?>
                                   <input type="hidden" name="old_photo" value="<?=$model->photo?>" />
                                
                           <br />
                           <div style="align: center">
                               <div style="border-radius: 25px;border: 2px solid #73AD21;padding: 20px;width: 200px;height: 200px;align: center;">
                                <?php echo Html::img('@web/uploads/logo/'.$model->photo,['style'=>'width:80%;'])?><br />
                            </div>
                           </div>
                           
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
                                  <?= Bank::getBankshortname($value->bank_id);?></td>
                                </div>
                                
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
                <div class="row">
                  <div class="col-lg-12">

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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

        <?php
        $this->registerJs('
          var bank_row_index = -1;
            $(function(){
                   var is_into = $("#is_into").val();
                  if(is_into > 0){
                    $("#card_into_expired").removeAttr("readonly");
                    $("#card_into").removeAttr("readonly");
                    $("#bank_account").removeAttr("readonly");
                   
                  }

                  $(".btn-add-commission").click(function(){

                    $("#myModal-commission").modal("show");
                   // $("#form-commission").reset();
                  });

                   $(".btn-add-bank").click(function(){

                    $("#myModal").modal("show");
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

            function removeDocref(e){
              if(confirm("ต้องการลบรายการนี้ใช่หรือไม่ ?")){
                var recid = e.parent().parent().attr("id");
                 $.ajax({
                           type: "POST",
                           dataType: "html",
                          url: "'.Url::toRoute(['/member/removedoc'], true).'",
                          data: {id: recid},
                          success: function(data){
                           // alert(data);
                                  $(".docuref").empty();
                                  $(".docuref").append(data);
                                }
                  });
              }
              
            }
',static::POS_END);
    ?>
