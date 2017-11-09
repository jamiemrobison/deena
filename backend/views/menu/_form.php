<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
				    <?= $form->field($model, 'name')->textInput() ?>

				    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

				    <?= $form->field($model, 'menu_type_id')->textInput() ?>
				    
				    <?= $form->field($model, 'parent_id')->widget(Select2::className(),[
				    	'data'=>ArrayHelper::map(\backend\models\Menu::find()->where(['IS','parent_id',NULL])->all(),'id','name'),
				    	'options'=>['placeholder'=>'เลือกเมนูหลัก'],
				    	'pluginOptions'=>[
				    		'allowClear'=> true,
				    	]
				    ]) ?>
				 	
				 	<?= $form->field($model, 'icon')->textInput() ?>
				 	
				 	<?= $form->field($model, 'url')->textInput() ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
 </div>
                </div>
              </div>
            </div>
          </div>
    <?php ActiveForm::end(); ?>

</div>
