<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\FileInput;
use toxor88\switchery\Switchery;

/* @var $this yii\web\View */
/* @var $model backend\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-form">


    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ข้อมูลร้านค้า
                </div>
                <div class="panel-body">
                    <div class="row">
                       <div class="col-lg-12">
                          <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;">โลโก้</label>
                                <div class="col-sm-10" style="padding: 10px 10px 10px 10px;">
                                   <div style="border-radius: 20px;border: 2px solid #73AD21;padding: 20px;width: 200px;height: 150px;text-align: center;">
                                      <?php echo Html::img('@web/uploads/logo/'.$model->logo,['style'=>'width:80%;'])?><br />
                                   </div>
                                   
                                </div>
                           </div>
                         <?php $form = ActiveForm::begin(['class'=>'form-horizontal','options' => ['enctype' => 'multipart/form-data']]); ?>
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

                    <div class="form-group">
                         <label class="control-label col-sm-2" for="email" style="bottom: -5px;"></label>
                                <div class="col-sm-10">
                                   <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                </div>
                       
                    </div>
                       
                     <?php ActiveForm::end(); ?>
                        </div>
                   </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ข้อมูลธนาคาร
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                     
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                   <div class="btn btn-success">เพิ่มบัญชีธนาคาร</div>
                </div>
              </div>
            </div>
                     
    </div>
</div>
