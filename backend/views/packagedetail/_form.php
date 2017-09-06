<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Packagedetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packagedetail-form">

    <?php $form = ActiveForm::begin(); ?>
     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                    <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('coverage_type')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'coverage_type')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\helpers\ProtectTitle::asArrayObject(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'coverage_type'],
                                    ]

                                  )->label(false) ?>
                                </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('converage_detail')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'converage_detail')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>

                    <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('amount')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>

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
