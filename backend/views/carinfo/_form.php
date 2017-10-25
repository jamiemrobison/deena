<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Carinfo */
/* @var $form yii\widgets\ActiveForm */

$carbrand = backend\models\Carbrand::find()->where(['status'=>1])->all();
$caryear = backend\models\Caryear::find()->where(['status'=>1])->all();

?>

<div class="carinfo-form">

    <?php $form = ActiveForm::begin(); ?>

   <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                
                 <?= $form->field($model, 'brand')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($carbrand,'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'caryear'],
                                    ]

                                  )->label() ?>

                  <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

                  <?php //echo $form->field($model, 'car_year')->widget(Select2::className(),
                                    // [
                                    //  'data'=> ArrayHelper::map($caryear,'id','year_text'),
                                    // 'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'year_text'],
                                    // ]

                                //  )->label() ?>

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
