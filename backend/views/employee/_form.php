<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use toxor88\switchery\Switchery;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
$pos = backend\models\Position::find()->where(['status'=>1])->all();
$user = backend\models\User::find()->where(['status'=>10])->all();
$prefix = \backend\models\Prefixname::find()->where(['status'=>1])->all();
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
                <div class="col-lg-3">
                   <div style="text-align: center;padding: 20px 0 0 50px;">

                      <div style="border-radius: 25px;border: 2px solid #73AD21;padding: 20px;width: 200px;height: 200px;align: center;">
                          <?php echo Html::img('@web/uploads/logo/'.$model->photo,['style'=>'width:80%;'])?><br />
                      </div>
                     <br />
                    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true])->label(false) ?>
                     <input type="hidden" name="old_photo" value="<?=$model->photo?>" />
                   </div>
                </div>
              <div class="col-lg-9">
                        
                        <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('prefix_name')?></label>
                                <div class="col-sm-10">
                                   <?= $form->field($model, 'prefix_name')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($prefix,'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'prefix_name'],
                                    ]

                                  )->label(false) ?>
                                </div>
                           </div>
                   <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('first_name')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'first_name'])->label(false) ?>
                                </div>
                           </div>
                           

                    <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('last_name')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'last_name')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'last_name'])->label(false) ?>
                                </div>
                           </div>

                   <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('position_id')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'position_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($pos,'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'position'],
                                    ]

                                  )->label(false) ?>
                                </div>
                           </div>

                   <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('phone')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'phone'])->label(false) ?>
                                </div>
                           </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('email')?></label>
                                <div class="col-sm-10">
                                  <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'email'])->label(false) ?>
                                </div>
                           </div>

                   <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('user_id')?></label>
                                <div class="col-sm-10">
                                 <?= $form->field($model, 'user_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($user,'id','username'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'username'],
                                    ]

                                  )->label(false) ?>
                                </div>
                           </div>
                    <div class="form-group">
                                <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-10">
                                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                                </div>
                           </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="control-label col-sm-2" for="name" style="bottom: -5px;text-align: right;"></label>
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
