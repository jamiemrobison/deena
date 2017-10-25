<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                  <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
 				  
 				  <?= $form->field($model, 'group_id')->widget(Select2::className(),[
 				  		'data'=> ArrayHelper::map(\backend\models\Usergroup::find()->all(),'id','name'),
 				  		'options'=>['placeholder'=>'เลือกกลุ่ม'],
 				  ]) ?>

           <?= $form->field($model, 'role_id')->widget(Select2::className(),[
              'data'=> ArrayHelper::map(\backend\models\Userrole::find()->all(),'id','name'),
              'options'=>['placeholder'=>'เลือกสิทธิ์การใช้งาน'],
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
