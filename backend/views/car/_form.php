<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                
              
  
                  <?= $form->field($model, 'car_code')->textInput(['maxlength' => true]) ?>
                  
                  

                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'type_id')->widget(Select2::className(),[
                      'data'=> ArrayHelper::map(\backend\models\Cartype::find()->where(['status'=>1])->all(),'id','name'),
                      'options'=>['placeholder'=>'เลือกประเภทรถ','id'=>'type_id',
                          'onchange'=>'
                            // $.post("index.php?r=car/showact&id=' . '"+$(this).val(),function(data){
                            //   $("select#act_id").html(data);
                            //   $("select#act_id").prop("disabled","");
                            // });
                          '
                      ],
                      'pluginOptions'=>[
                      'allowClear'=>true,
                      ]
                  ])->label() ?>
                  
                   <?= $form->field($model, 'act_id')->widget(Select2::className(),[
                      'data'=> ArrayHelper::map(\backend\models\Act::find()->where(['status'=>1])->all(),'id','car_code'),
                      'options'=>['placeholder'=>'เลือกรหัสพรบ','id'=>'act_id',
                          'onchange'=>'
                            
                          '
                      ]
                  ]) ?>

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
