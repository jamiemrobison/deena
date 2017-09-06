<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$cat = \backend\models\Category::find()->where(['status'=>1])->all();
$sub_cat = \backend\models\Product::find()->where(['status'=>1])->all();
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
 <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">

                    <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'category_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($cat,'id','name'),
                                    'options'=>['placeholder' => 'เลือกหมวดผลิตภัณฑ์','class'=>'form-control','id'=>'level'],
                                    ]

                                  )->label() ?>
                    <?= $form->field($model, 'parent_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($sub_cat,'id','name'),
                                    'options'=>['placeholder' => 'เลือกหมวดผลิตภัณฑ์ย่อย','class'=>'form-control','id'=>'sub_cat'],
                                    ]

                                  )->label() ?>

                    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

                    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>


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
