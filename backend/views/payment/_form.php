<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\BankAccount;
use backend\models\Bank;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */
/* @var $form yii\widgets\ActiveForm */

$bank = Bank::find()->where(['status'=> 1,'party_type_id'=>1])->all();
$account = BankAccount::find()->where(['status'=> 1,'party_type_id'=>1])->all();
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('insure_no')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'insure_no')->widget(Select2::className(),[
                                      'data' => ArrayHelper::map(\backend\models\Insurance::find()->all(),'id','insure_code'),
                                      'options'=>['placeholder'=>'เลือกเลขที่ใบแจ้งงาน'],
                                      'pluginOptions' =>[
                                        'allowClear' => true,
                                      ]

                                  ])->label(false) ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_date')?></label>
                                <div class="col-sm-9">
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
                                  <?= $form->field($model, 'payment_method')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\helpers\PaymentType::asArrayObject(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'payment_method'],
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
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'bank_account'],
                                    ]

                                  )->label(false) ?>   
                                </div>
                           </div>
                          
                          
                         <!--   <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'status')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div> -->
                           
                       
                       

                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('period_no')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'period_no')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                           
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('payment_time')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'payment_time')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>
                             <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('bank_id')?></label>
                                <div class="col-sm-9">
                                   <?= $form->field($model, 'bank_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($bank,'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'bank_id'],
                                    ]

                                  )->label(false) ?>    
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('amount')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
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
                    <hr />
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                             <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('attachfile')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'attachfile')->fileInput(['maxlength' => true,'class'=>'form-inline'])->label(false) ?>
                                </div>
                           </div>
                        </div>
                    </div>
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
      </div>
    <?php ActiveForm::end(); ?>

</div>
