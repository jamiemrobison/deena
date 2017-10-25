<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Paymentchannel */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="paymentchannel-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                
                   <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                  
                  <?= $form->field($model, 'type_id')->widget(Select2::className(),[
                      'data'=> ArrayHelper::map(\backend\helpers\PaymentType::asArrayObject(),'id','name'),
                      'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'type_id',]
                  ]) ?>

                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']]) ?>

                  <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>
                </div>
                </div>
                  
                </div>
              </div>
            </div>
          </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs('
      $(function(){
          // $("input").iCheck({
          //     checkboxClass: "icheckbox_square-green",
          //     radioClass: "iradio_square-green",
          //     increaseArea: "20%" // optional
          // });
      });
  ',static::POS_END);?>