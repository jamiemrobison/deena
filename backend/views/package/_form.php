<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;

use backend\helpers\ProtectTitle;
use backend\helpers\ConditionTitle;
/* @var $this yii\web\View */
/* @var $model backend\models\Package */
/* @var $form yii\widgets\ActiveForm */
$servicetype = \backend\helpers\Servicetype::asArrayObject();
$add_protect_url = Yii::$app->getUrlManager()->createUrl('/packagedetail/create');
$list_protect_url = Yii::$app->getUrlManager()->createUrl('/packagedetail/list');


?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                    
                    <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('company_insure')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'company_insure')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\models\Insurancecompany::find()->all(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'company'],
                                    ]

                                  )->label(false) ?>
                                </div>
                    </div>

                    <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('insure_type')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'insure_type')->widget(Select2::className(),
                                    [
                                     'data'=> ArrayHelper::map(\backend\models\Product::find()->all(),'id','name'),
                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'type'],
                                    ]

                                  )->label(false) ?>
                                </div>
                    </div>

                  

                           <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('name')?></label>
                                <div class="col-sm-9">
                                  <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control form-inline'])->label(false) ?>
                                </div>
                           </div>

                   <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('start_date')?></label>
                                <div class="col-sm-9">
                                 <?php $model->start_date!=''?$model->start_date = date('d-m-Y',$model->start_date):'';?>
                                  <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label(false)
                                  ?>
                                </div>
                           </div>

                     <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('end_date')?></label>
                                <div class="col-sm-9">
                                 <?php $model->end_date!=''?$model->end_date = date('d-m-Y',$model->end_date):'';?>
                                  <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%']])->label(false)
                                  ?>
                                </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('service_type')?></label>
                                <div class="col-sm-9">
                                    <?= $form->field($model, 'service_type')->widget(Select2::className(),
                                                    [
                                                     'data'=> ArrayHelper::map($servicetype,'id','name'),
                                                    'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'level'],
                                                    ]

                                                  )->label(false) ?>
                                              </div>
                                          </div>
                     <div class="form-group">
                                <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model->getAttributeLabel('status')?></label>
                                <div class="col-sm-9">
                                    <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
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

          <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            ความคุ้มครอง
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <a href="" class="btn-addprotect"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
                <table class="table table-striped table-hover table-protect">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่อ</th>
                      <th>รายละเอียด</th>
                      <th>จำนวนเงิน</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="add-protect-body">
                    <?php if(!$model->isNewRecord):?>
                    <?php $cnt =0;?>
                      <?php foreach($model_protect_detail as $value):?>
                      <?php $cnt+=1;?>
                          <tr id="ordered-protect-id-">
                              <td><?=$cnt;?></td>
                              <td>
                                <input type="text" class="form-control " name="protect[]" value="<?= ProtectTitle::getTypeById($value->coverage_type);?>" disabled="disabled" />
                                <input type="hidden" class="protectid" name="protectid[]" value="<?= $value->coverage_type;?>"/>
                              </td>
                              <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
                              <td><input type="text" class="form-control description" name="description[]" value="<?= $value->converage_detail;?>" /></td>
                              
                             <td><input type="text" class="form-control amount" name="amount[]" value="<?= $value->amount;?>" /></td>
                              
                            <td class="action">
                                <a class="btn btn-white remove-line" onClick="protectremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                              </td>
                          </tr>
                      <?php endforeach;?>
                    <?php endif;?> 
                  </tbody>
                </table>
              </div>
              
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            
            เงื่อนไขการคุ้มครอง
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <a href="" class="btn-addcondition"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
                <table class="table table-striped table-hover table-condition">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่อ</th>
                      <th>รายละเอียด</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="add-condition-body">
                    <?php if(!$model->isNewRecord):?>
                    <?php $cnt =0;?>
                      <?php foreach($model_condition_detail as $value):?>
                      <?php $cnt+=1;?>
                          <tr id="ordered-condition-id-">
                              <td><?=$cnt;?></td>
                              <td>
                                <input type="text" class="form-control " name="condition[]" value="<?= ConditionTitle::getTypeById($value->title_id);?>" disabled="disabled" />
                                <input type="hidden" class="conditionid" name="conditionid[]" value="<?= $value->title_id;?>"/>
                              </td>
                              <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
                              <td><input type="text" class="form-control desc_condition" name="desc_condition[]" value="<?= $value->condition_text;?>" /></td>
                              
                            <td class="action">
                                <a class="btn btn-white remove-line" onClick="conditionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                              </td>
                          </tr>
                      <?php endforeach;?>
                    <?php endif;?> 
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <?php ActiveForm::end(); ?>
       <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>เพิ่มความคุ้มครอง</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-protect']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_protect->getAttributeLabel('coverage_type')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_protect, 'coverage_type')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\ProtectTitle::asArrayObject(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'coverage_type'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_protect->getAttributeLabel('converage_detail')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_protect, 'converage_detail')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'coverage_detail'])->label(false) ?>
                                              </div>
                                         </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_protect->getAttributeLabel('amount')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_protect, 'amount')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'amount'])->label(false) ?>
                                              </div>
                                         </div>

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-add-protect">ตกลง</div>
                                </div>
                              </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>

    <?php ActiveForm::end(); ?>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Close</button>
          </div> -->
          </div>
        </div>
        </div>


        <div id="myModal-condition" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
              <h3>เพิ่มเงื่อนไขความคุ้มครอง</h3>
          </div>
          <div class="modal-body">
             <?php $form = ActiveForm::begin(['id'=>'form-condition']); ?>
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_condition->getAttributeLabel('title_id')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_condition, 'title_id')->widget(Select2::className(),
                                                  [
                                                   'data'=> ArrayHelper::map(\backend\helpers\ConditionTitle::asArrayObject(),'id','name'),
                                                  'options'=>['maxlength' => true,'class'=>'form-control form-inline','id'=>'title_id'],
                                                  ]

                                                )->label(false) ?>
                                              </div>
                                  </div>

                                  <div class="form-group">
                                              <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"><?=$model_condition->getAttributeLabel('condition_text')?></label>
                                              <div class="col-sm-9">
                                                <?= $form->field($model_condition, 'condition_text')->textInput(['maxlength' => true,'class'=>'form-control form-inline','id'=>'condition_text'])->label(false) ?>
                                              </div>
                                         </div>

                                 

                                 <div class="form-group">
                                    <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                    <div class="btn btn-success btn-add-condition">ตกลง</div>
                                </div>
                              </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>

    <?php ActiveForm::end(); ?>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Close</button>
          </div> -->
          </div>
        </div>
        </div>
</div>
<?php
$this->registerJs('
    $(function(){
       // $(".protect").hide();
        $(".btn-addprotect").on("click",function(e){
          e.preventDefault();
          $("#myModal").modal("show");
        });

        $(".btn-addcondition").on("click",function(e){
          e.preventDefault();
          $("#myModal-condition").modal("show");
        });


        $(".btn-add-protect").click(function(e){
          var type = $("#coverage_type").val();
          var detail = $("#coverage_detail").val();
          var amount = $("#amount").val();
          var protect_text = $("#coverage_type option:selected").text();
         // alert(type + " " + detail + " "+ amount);
         // $(".table-protect").hide()
         // $(".table-protect").append("<tr><td>1</td><td>"+protect_text+"</td><td>"+detail+"</td><td>"+amount+"</td><td><span><div class=\"btn btn-default\"><i class=\"fa fa-edit\"></i></div></span><span><div class=\"btn btn-default remove-line\"><i class=\"fa fa-minus\"></i></div></span></td></tr>");
            $.ajax({
                   type: "POST",
                   dataType: "html",
                  url: "'.Url::toRoute(['/package/addprotect'], true).'",
                  data: { txt: protect_text,id: type,desc: detail,amt: amount },
                  success: function(data){
                    //alert(data);
                          $(".add-protect-body").parent().append(data);
                          var cnt =0;
                          $(".table-protect >tbody >tr").each(function(){
                            cnt +=1;
                            $(this).find("td:first-child").text(cnt);
                          });
                                         // totalall();
                        }
              });
          $("#myModal").modal("hide");
        });

        $(".btn-add-condition").click(function(e){
          var type = $("#title_id").val();
          var detail = $("#condition_text").val();
          var title_text = $("#title_id option:selected").text();
        
            $.ajax({
                   type: "POST",
                   dataType: "html",
                  url: "'.Url::toRoute(['/package/addcondition'], true).'",
                  data: { txt: title_text,id: type,desc: detail },
                  success: function(data){
                   // alert(data);
                          $(".add-condition-body").parent().append(data);
                          var cnt =0;
                          $(".table-condition >tbody >tr").each(function(){
                            cnt +=1;
                            $(this).find("td:first-child").text(cnt);
                          });
                                         // totalall();
                        }
              });
          $("#myModal-condition").modal("hide");
        });
        
    });
   function protectremove(e){
      if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
          e.parents("tr").remove();
          var cnt = 0;
          $(".table-protect >tbody >tr").each(function(){
            cnt +=1;
            e.find("td:first-child").text(cnt);
          });
    }
   }
   function conditionremove(e){
      if(confirm("ต้องการลบรายการนี้ใช่หรือไม่")){
          e.parents("tr").remove();
          var cnt = 0;
          $(".table-condition >tbody >tr").each(function(){
            cnt +=1;
            e.find("td:first-child").text(cnt);
          });
    }
   }
  ',static::POS_END);
 ?>
