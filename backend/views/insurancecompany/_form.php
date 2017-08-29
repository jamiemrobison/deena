<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;

/* @var $this yii\web\View */
/* @var $model backend\models\Insurancecompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insurancecompany-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                 <div class="form-inline">
                               <!--  <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;">โลโก้</label> -->
                                <div class="col-sm-10">
                                   <!--  <i class="fa fa-user"></i> -->
                                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                   <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
                                   <?= $form->field($model, 'found_date')->textInput(['maxlength' => true]) ?>
                                   <?= $form->field($model, 'credit_limit')->textInput(['maxlength' => true]) ?>
                                   <?= $form->field($model, 'payment_term')->textInput(['maxlength' => true]) ?>
                                   <?= $form->field($model, 'vat')->textInput(['maxlength' => true]) ?>
                                   <?= $form->field($model, 'emergency_call')->textInput(['maxlength' => true]) ?>
                                 
                                </div>

                </div>
                 
              
               

                <?php //echo $form->field($model, 'logo')->fileInput(['maxlength' => true]) ?>

                

                 
                </div>
               
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-inline">
                      <div class="col-sm-10">
                        <div class="form-group">
                      <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']]) ?>
                  </div>  
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
                </div>
              </div>
            </div>
          </div>
   
    <?php ActiveForm::end(); ?>

</div>
