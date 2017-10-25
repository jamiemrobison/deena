<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;

/* @var $this yii\web\View */
/* @var $model backend\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                 <div style="padding-left: 15px">
                     <?php echo Html::img('@web/uploads/logo/'.$model->logo);?>
                 </div>
                  
                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'logo')->fileInput(['maxlength' => true]) ?>

                   <input type="hidden" name="old_logo" value="<?=$model->logo?>" />

                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']]) ?>

                  <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>
                </div>
                <div class="col-lg-6">
                   
                </div>
                </div>
                </div>
              </div>
            </div>
          </div>

    <?php ActiveForm::end(); ?>

</div>
