<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CommissionInsure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commission-insure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'insure_type')->textInput() ?>

    <?= $form->field($model, 'promotion_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission_percent')->textInput() ?>

    <?= $form->field($model, 'commission_amont')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
