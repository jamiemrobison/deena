<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

use backend\models\CarType;


/* @var $this yii\web\View */
/* @var $model backend\models\Act */
/* @var $form yii\widgets\ActiveForm */
$cartype = CarType::find()->all();

?>

<div class="act-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                        <!-- <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('act_code_id')?></label>
                                <div class="col-sm-9">
                                   <?php //echo $form->field($model, 'act_code_id')->widget(Select2::className(),[
                                     // 'data'=>ArrayHelper::map(\backend\models\Car::find()->all(),'id','act_code'),
                                      //'options'=>['placeholder'=>'เลือกรหัสรถ'],
                                      //'pluginOptions'=>[
                                        //'allowClear'=> true,
                                     // ]
                                   //])->label(false) ?>
                                </div>
                        </div> -->
                          <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('car_code')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'car_code')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('car_description')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'car_description')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                        </div>
                          <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('tax')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'tax')->textInput(['maxlength' => true,'class'=>'form-control form-inline tax'])->label(false) ?>
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('all_premium')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'all_premium')->textInput(['maxlength' => true,'class'=>'form-control form-inline all_premium','readonly'=>'readonly','value'=>number_format($model->all_premium,2)])->label(false) ?>
                                </div>
                        </div>
                       <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('score_rate')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'score_rate')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'score_rate','value'=>!$model->isNewRecord?$model->score_rate:0])->label(false) ?>
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-9">
                                 <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"></label>
                                <div class="col-sm-9">
                                 <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                </div>
                        </div>
                   
                  </div>
                  <div class="col-lg-6">
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('car_type_id')?></label>
                                <div class="col-sm-9">
                                   <?= $form->field($model, 'car_type_id')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map($cartype,'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'car_type_id'],
                                    ]

                                  )->label(false) ?> 
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('tax_premium')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'tax_premium')->textInput(['maxlength' => true,'class'=>'form-control form-inline tax_premium'])->label(false) ?>
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('duty')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'duty')->textInput(['maxlength' => true,'class'=>'form-control form-inline duty'])->label(false) ?>
                                </div>
                        </div>
                          <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('protect_amount')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'protect_amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline protect_amount','value'=>number_format($model->protect_amount,2),])->label(false) ?>
                                </div>
                        </div>
                          <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('score')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'score')->textInput(['maxlength' => true,'class'=>'form-control form-inline protect_amount','id'=>'score','readonly'=>'readonly'])->label(false) ?>
                                </div>
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
<?php $this->registerJs('
    $(function(){

        $(".tax_premium").change(function(){
            duty = $(".duty").val();
            tax_premium =  $(".tax_premium").val();
            tax =  $(".tax").val();
            var alltotal = parseFloat(parseFloat(tax_premium) + parseFloat(tax) + parseFloat(duty)).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            $(".all_premium").val(alltotal);

            var rate = $("#score_rate").val();
            $("#score").val(parseFloat(($(this).val()*rate)/100).toFixed(2));
        });
        $("#score_rate").change(function(){
            var tax = $(".tax_premium").val();
            $("#score").val((($(this).val()*tax)/100).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
         $(".tax").change(function(){
            duty = $(".duty").val();
            tax_premium =  $(".tax_premium").val();
            tax =  $(".tax").val();
            var alltotal = parseFloat(parseFloat(tax_premium) + parseFloat(tax) + parseFloat(duty)).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    $(".all_premium").val(alltotal);
                });
        });
        $(".duty").change(function(){
            duty = $(".duty").val();
            tax_premium =  $(".tax_premium").val();
            tax =  $(".tax").val();
            var alltotal = parseFloat(parseFloat(tax_premium) + parseFloat(tax) + parseFloat(duty)).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            $(".all_premium").val(alltotal);
        });
',static::POS_END);?>