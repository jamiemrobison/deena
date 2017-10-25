<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Promotion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">

                    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

                    <?= $form->field($model, 'amount')->textInput() ?>

                    <?= $form->field($model, 'promotion_type')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\models\Promotiontype::find()->all(),'id','name'),
                                    'options'=>['placeholder' => 'เลือกประเภทโปรโมชั่น','class'=>'form-control','id'=>'promotion_type',
                                       
                                    ],
                                    ]

                     )->label() ?>
                    <?php if(!$model->isNewRecord):?>
                    <?php $model->start_date = date("d-m-Y",$model->start_date);?>
                    <?php $model->end_date = date("d-m-Y",$model->end_date);?>
                    <?php endif;?>
                     <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label(false)
                                  ?>

                     <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label(false)
                                  ?>

                    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>
                        <input type="hidden" name="old_photo" value="<?=$model->photo?>" />
                    <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']]) ?>

                    <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <div class="col-lg-6">
                   <div class="row">
                  
                     <div class="col-lg-12">
                      <?= Html::img('@web/uploads/logo/'.$model->photo,['style'=>'width:100%;padding: 20px'])?>
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
