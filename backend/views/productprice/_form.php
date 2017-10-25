<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Productprice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productprice-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('package_id')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'package_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\models\Package::find()->all(),'id',function($data){
                                        return $data->package_code." [ ".$data->name." ]";
                                     }),
                                    'options'=>['maxlength' => true,'placeholder'=>'เลือกรหัสแพคเก็จ','class'=>'form-control form-inline','id'=>'package_id',
                                              'onchange'=>' 
                                                $.post("index.php?r=productprice/getscorerate&id=' . '"+$(this).val(),function(data){
                                                    var rate = data;
                                                    var all = $("#total").val();
                                                    var score = parseFloat((all * rate)/100).toFixed(2);
                                                    $("#score").val(score);
                                                    $("#cur_package").val(rate);
                                                });
                                              '
                                    ],
                                    ]

                                  )->label(false) ?>
                                </div>
                              <input type="hidden" name="cur_package" id="cur_package" value="<?=$model->package_id?>" />
                    </div>
                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('car_start_year')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'car_start_year')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                    </div>
                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('car_end_year')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'car_end_year')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                    </div>

                   
                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('amount_start')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'amount_start')->textInput(['maxlength' => true,'class'=>'form-control form-inline','value'=>number_format($model->amount_start,2)])->label(false) ?>
                                </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('amount_end')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'amount_end')->textInput(['maxlength' => true,'class'=>'form-control form-inline','value'=>number_format($model->amount_end,2)])->label(false) ?>
                                </div>
                    </div>

                     <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('total')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'total')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'total','value'=>number_format($model->total,2),
                                      'onchange'=>'
                                                    var rate = $("#cur_package").val();
                                                    var all = $("#total").val();
                                                    var score = parseFloat((all * rate)/100).toFixed(2);
                                                    $("#score").val(score);
                                                    
                                      '
                                  ])->label(false) ?>
                                </div>
                    </div>
                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('alltotal')?></label>
                                <div class="col-sm-8">
                                  <?= $form->field($model, 'alltotal')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'alltotal','value'=>number_format($model->alltotal,2)])->label(false) ?>
                                </div>
                    </div>

                 
                </div>
                <div class="col-lg-6">
                   
                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('is_discount')?></label>
                                <div class="col-sm-8">
                                    <?php $model->isNewRecord?$model->is_discount=1:$model->is_discount;?>
                                  <?= $form->field($model, 'is_discount')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\helpers\YesNo::asArrayObject(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'is_discount'],
                                    ]

                                  )->label(false) ?>
                                </div>
                    </div>

                     <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('is_introduce')?></label>
                                <div class="col-sm-8">
                                    <?php $model->isNewRecord?$model->is_introduce=1:$model->is_introduce;?>
                                  <?= $form->field($model, 'is_introduce')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\helpers\YesNo::asArrayObject(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'is_introduce'],
                                    ]

                                  )->label(false) ?>
                                </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('is_line')?></label>
                                <div class="col-sm-8">
                                    <?php $model->isNewRecord?$model->is_line=1:$model->is_line;?>
                                  <?= $form->field($model, 'is_line')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\helpers\YesNo::asArrayObject(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'is_line'],
                                    ]

                                  )->label(false) ?>
                                </div>
                    </div>

                    <?php //echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                     <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('score')?></label>
                                <div class="col-sm-8">
                                  <?php echo $form->field($model, 'score')->textInput(['class'=>'form-control','id'=>'score','readonly'=>'readonly','value'=>number_format($model->score,2)])->label(false) ?>
                                </div>
                    </div>
                     <div class="form-group">
                                <label class="control-label col-sm-4" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-8">
                                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                                </div>
                    </div>
                    


                </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
                 <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>
            </div>
          </div>

    <?php ActiveForm::end(); ?>

</div>
