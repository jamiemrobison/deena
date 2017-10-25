<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */

$cat = \backend\models\Newscategory::find()->where(['status'=>1])->all();
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'category_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($cat,'id','name'),
                                    'options'=>['placeholder'=>'เลือกหมวดข่าวสาร','maxlength' => true,'class'=>'form-control form-inline','id'=>'category_id'],
                                    ]

                                  )->label() ?>

                    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ]) ?>
                    <?php if($model->isNewRecord){$model->start_date = date('d-m-Y');}else{$model->start_date=date('d-m-Y',$model->start_date);}?>
                    <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%','id'=>'start_date']])->label()
                                  ?>
                    <?php if($model->isNewRecord){$model->end_date = date('d-m-Y');}else{$model->end_date=date('d-m-Y',$model->end_date);}?>
                    <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%','id'=>'end_date']])->label()
                                  ?>

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
