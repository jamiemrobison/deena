<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\models\Province;
use kartik\date\DatePicker;
use backend\models\Carbrand;
use backend\models\Caryear;
use backend\models\Carinfo;
use toxor88\switchery\Switchery;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
$prov = Province::find()->all();
$prefix = \backend\models\Prefixname::find()->all();
?>

<div class="quotation-form">

    <?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="packageid" value="0" />
     <div class="row">
      <div class="col-lg-12">
         <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                      <div class="btn btn-primary btn-create-insure" id="">สร้างใบแจ้งงาน</div>
                      <div class="btn btn-default">พิมพ์ใบเสนอราคา</div>
         </div>
      </div>
     </div>
     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-2">
                 <?= $form->field($model, 'quotation_no')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
              </div>
               <div class="col-lg-3">
                <?php if(!$model->isNewRecord){$model->quotation_date = date('d-m-Y',$model->quotation_date);}?>
                 <?= $form->field($model, 'quotation_date')->widget(DatePicker::className(), [ 'pluginOptions' => [
                                          'format' => 'dd-mm-yyyy',
                                          //'value' => date('dd-mm-yyyy'),
                                          'autoclose' => true,
                                          'todayHighlight' => true
                                      ], 'options' => ['style' => 'width: 100%','id'=>'quotation_date']])->label()
                                  ?>
              </div>
              <div class="col-lg-2">
                 <?= $form->field($model, 'prefix_id')->widget(Select2::className(),[
                  'data'=> ArrayHelper::map($prefix,'id','name'),
                  'options'=>['placeholder'=>'เลือก']
                 ]) ?>
              </div>
              <div class="col-lg-2">
                 <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="col-lg-3">
                 <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="col-lg-6">

                </div>
              
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <?= $form->field($model,'car_brand')->widget(Select2::className(),[
                                'data'=>ArrayHelper::map(Carbrand::find()->all(),'id','name'),
                                'options'=>['placeholder'=>'เลือกยี่ห้อ',
                                    'onchange'=>'
                                        $.post("index.php?r=insurance/showmodel&id=' . '"+$(this).val(),function(data){
                                              $("select#car_model").html(data);
                                              $("select#car_model").prop("disabled","");
                                        });
                                    '
                                ],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                                ])->label() ?>

                  </div>
                   <div class="col-lg-3">

                   <?= $form->field($model,'car_model')->widget(Select2::className(),[
                      'data'=>ArrayHelper::map(Carinfo::find()->all(),'id','model'),
                      'options'=>['placeholder'=>'เลือกรุ่น','disabled'=>'disabled','id'=>'car_model'],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                      ])->label() ?>

                  </div>
                   <div class="col-lg-2">
                   
                      <?= $form->field($model,'car_year')->widget(Select2::className(),[
                      'data'=>ArrayHelper::map(Caryear::find()->all(),'id','year_eng'),
                      'options'=>['placeholder'=>'เลือกปีรถ'],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                      ])->label() ?>

                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1">
                    <?= $form->field($model, 'plate_category')->textInput(['maxlength' => true]) ?>

                  </div>
                   <div class="col-lg-2">

                   <?= $form->field($model, 'plate_number')->textInput(['maxlength' => true]) ?>
                  </div>
                   <div class="col-lg-3">
                   
                     <?= $form->field($model, 'plate_province')->widget(Select2::className(),
                                    [
                                    'data'=> ArrayHelper::map($prov,'PROVINCE_ID','PROVINCE_NAME'),
                                    'options'=>['placeholder'=>'เลือกจังหวด','maxlength' => true,'class'=>'form-control form-inline','id'=>'plate_province'],
                                    ]

                                  )->label() ?>   

                  </div>
                   <div class="col-lg-2" style="padding-top: 20px;">
                        <?php echo $form->field($model, 'include_act')->widget(Switchery::className(),['options'=>['label'=>'',
                          'onchange'=>''
                        ]])->label() ?>
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
                  รายละเอียดแพ็กเก็จที่เลือก
                  <div class="pull-right">
                   
                  </div>
                </div>
                <div class="panel-body">

                      <div class="quotation">
                      <table style="width: 100%" class="table table-striped">
                        
                        <tr>
                          <td colspan="5">
                            <table class="table table-striped" border="1" cellpadding="1" cellspacing="0" width="100%">
                              <tr>
                                <td style="background-color:pink;padding: 5px;text-align: center;border-bottom: none;border-left:none;border-top:none;width:50%;">
                                  เงื่อนไขความคุ้มครอง
                                </td>
                                <?php if(count($companylist)>0):?>
                                  <?php for($i=0;$i<=count($companylist)-1;$i++):?>
                                    <td style="background-color:pink;padding: 5px;text-align: center;border-bottom: none;border-top:none;border-left:none;width:20%;">
                                      <?=$companylist[$i]["short_name"]?>
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                               
                              </tr>
                              <tr>
                                 <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                  ซ่อม
                                </td>
                                <?php if(count($servicelist)>0):?>
                                  <?php for($i=0;$i<=count($servicelist)-1;$i++):?>
                                    <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                      <?=$servicelist[$i]['service_type']==1?"อู่":"ห้าง"?>
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                           
                              </tr>
                             
                              <tr>
                                <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-left:none;">
                                  ประเภทประกัน
                                </td>
                                <?php if(count($insuretypelist)>0):?>
                                  <?php for($i=0;$i<=count($insuretypelist)-1;$i++):?>
                                    <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-left:none;">
                                      <?=$insuretypelist[$i]['product_code']?>
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                               
                              </tr>
                               <tr>
                                 <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-left:none;">
                                  ช่วงทุนประกัน
                                </td>
                                <?php if(count($insurecost)>0):?>
                                  <?php for($i=0;$i<=count($insurecost)-1;$i++):?>
                                    <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-left:none;">
                                      <input type="hidden" name="s_amt" class="s_amt-<?=$i?>" value="<?=$insurecost[$i]['amount_start']?>">
                                      <input type="hidden" name="n_amt" class="n_amt-<?=$i?>" value="<?=$insurecost[$i]['amount_end']?>">
                                      <?=number_format($insurecost[$i]['amount_start'])." - ".number_format($insurecost[$i]['amount_end'])?>
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                          
                              </tr>
                              <tr>
                                <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                  ความคุ้มครองบุคคลภายนอก:
                                </td>
                                <?php if(count($companylist)>0):?>
                                  <?php for($i=0;$i<=count($companylist)-1;$i++):?>
                                    <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                               
                              </tr>
                              <?php if(count($listid)>0):?>
                                <?php for($i=0;$i<=count($listid)-1;$i++):?>
                                  <tr>
                                    <?php if($listid[$i]['coverage_type']==1):?>
                                      <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-left: 10px;">
                                        <?=$listid[$i]['actprotect_name']?>
                                      </td>

                                      <?php if(count($amountlist1)>0):?>                   
                                        <?php for($a=0;$a<=count($amountlist1)-1;$a++):?>                 
                                        <?php if($amountlist1[$a]['actprotect_id'] == $listid[$i]['actprotect_id']):?>
                                          <td style="text-align: right;border-top: none;border-bottom: none;border-left:none;border-left: none;padding-right: 10px;">
                                            <?= number_format($amountlist1[$a]['amount'])?>
                                          </td>
                                        <?php endif;?>
                                        <?php endfor;?>
                                        <?php endif;?>
                                      <?php endif;?>

                                   </tr>
                                <?php endfor;?>
                              <?php endif;?>
                             


                              <tr>
                                <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                  ความคุ้มครองตัวรถที่เอาประกัน:
                                </td>
                                <?php if(count($companylist)>0):?>
                                  <?php for($i=0;$i<=count($companylist)-1;$i++):?>
                                    <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                  
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                              
                              </tr>
                               <tr>
                                <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                  ทุนประกันรถยนต์
                                </td>
                                <?php if(count($insurecost)>0):?>
                                  <?php for($i=0;$i<=count($insurecost)-1;$i++):?>
                                    <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                      <input type="text" class="form-control cost" id="cost-<?=$i?>" onchange="checkcost($(this))" style="text-align: right;" value=""/> 
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                                <!-- <td style="text-align: left;border-top: none;border-bottom: none;padding-top: 5px;">
                                  
                                </td>
                                <td style="text-align: left;border-top: none;border-bottom: none;padding-top: 5px;">
                                  
                                </td>
                                <td style="text-align: left;border-top: none;border-bottom: none;padding-top: 5px;">
                                  
                                </td> -->
                              </tr>

                              <?php if(count($listid)>0):?>
                                <?php for($i=0;$i<=count($listid)-1;$i++):?>
                                  <tr>
                                    <?php if($listid[$i]['coverage_type']==2):?>
                                      <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-left: 10px;">
                                        <?=$listid[$i]['actprotect_name']?>
                                      </td>

                                      <?php if(count($amountlist1)>0):?>
                                        <?php for($a=0;$a<=count($amountlist1)-1;$a++):?>
                                        <?php if($amountlist1[$a]['actprotect_id'] == $listid[$i]['actprotect_id']):?>
                                          <td style="text-align: right;border-top: none;border-bottom: none;border-left:none;padding-right: 10px;">
                                            <?= number_format($amountlist1[$a]['amount'])?>
                                          </td>
                                        <?php endif;?>
                                        <?php endfor;?>
                                        <?php endif;?>
                                      <?php endif;?>


                                    <!-- <td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
                                      2,000,000
                                    </td>
                                    <td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
                                      1,000,000
                                    </td>
                                    <td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
                                      4,000,000
                                    </td> -->
                                  </tr>
                                <?php endfor;?>
                              <?php endif;?>

                              <tr>
                                <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                  ความคุ้มครองคนในรถ:
                                </td>
                                <?php if(count($companylist)>0):?>
                                  <?php for($i=0;$i<=count($companylist)-1;$i++):?>
                                    <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-top: 5px;">
                                  
                                    </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                                <!-- <td style="text-align: left;border-top: none;border-bottom: none;padding-top: 5px;">
                                  
                                </td>
                                <td style="text-align: left;border-top: none;border-bottom: none;padding-top: 5px;">
                                  
                                </td>
                                <td style="text-align: left;border-top: none;border-bottom: none;padding-top: 5px;">
                                  
                                </td> -->
                              </tr>
                              <?php if(count($listid)>0):?>
                                <?php for($i=0;$i<=count($listid)-1;$i++):?>
                                  <tr>
                                    <?php if($listid[$i]['coverage_type']==3):?>
                                      <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;padding-left: 10px;">
                                        <?=$listid[$i]['actprotect_name']?>
                                      </td>

                                      <?php if(count($amountlist1)>0):?>
                                        <?php for($a=0;$a<=count($amountlist1)-1;$a++):?>
                                        <?php if($amountlist1[$a]['actprotect_id'] == $listid[$i]['actprotect_id']):?>
                                          <td style="text-align: right;border-top: none;border-bottom: none;border-left:none;padding-right: 10px;">
                                            <?= number_format($amountlist1[$a]['amount'])?>
                                          </td>
                                        <?php endif;?>
                                        <?php endfor;?>
                                        <?php endif;?>
                                      <?php endif;?>


                                    <!-- <td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
                                      2,000,000
                                    </td>
                                    <td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
                                      1,000,000
                                    </td>
                                    <td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
                                      4,000,000
                                    </td> -->
                                  </tr>
                                <?php endfor;?>
                              <?php endif;?>
                              

                                <!-- ----- เบี้ย ---------- -->


                                
                                <tr>
                                  <td style="text-align: left;border-bottom: none;border-left:none;padding-top: 10px;">
                                      เบี้ยประกัน (ไม่รวม พรบ.)
                                  </td>
                                  <?php if(count($pricelist)>0):?>
                                      <?php for($i=0;$i<=count($pricelist)-1;$i++):?>
                                        <td style="text-align: right;border-bottom: none;border-left:none;padding-top: 10px;padding-right: 5px;">
                                        <input type="text" name="package-amt[]" class="form-control package-amt" id="package-amt-<?=$i?>" style="text-align: right;" value="<?= number_format($pricelist[$i]['amount'],2)?>" />
                                        
                                    </td>
                                      <?php endfor;?>
                                  <?php endif;?>

                                </tr>
                                <tr>
                                  <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;">
                                     พรบ
                                  </td>
                                   <!-- <td style="text-align: left;border-top: none;border-bottom: none;border-left:none;">
                                     <input type="text" class="form-control" id="atc" value="" disabled/>
                                   </td> -->
                                    <?php if(count($actprice)>0):?>
                                      <?php for($i=0;$i<=count($actprice)-1;$i++):?>
                                         <td style="text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                          <input type="hidden" name="line-id[]" class="form-control" value="<?=$actprice[$i]["lineid"]?>" />
                                            <input type="text" name="package-act[]" class="form-control package-act" id="package-act-<?=$i?>" style="text-align: right;" value="<?= number_format($actprice[$i]['act_amount'],2)?>" />
                                        </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                                </tr>
                                <tr>
                                  <td style="text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                     ราคา เบี้ยประกัน + พรบ.
                                  </td>
                                   <?php if(count($pricelist)>0):?>
                                      <?php for($i=0;$i<=count($pricelist)-1;$i++):?>
                                         <td style="text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                          <?php
                                                $p1 = $pricelist[$i]['amount'];
                                                $p2 = $actprice[$i]['act_amount'];
                                                $col_total = $p1 + $p2;
                                          ?>
                                           <input type="text" class="form-control" id="package-total-<?=$i?>" style="text-align: right;" value="<?= number_format($col_total,2)?>" readonly />
                                        </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                                </tr>
                                <tr>
                                  <td style="text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                  </td>
                                   <?php if(count($pricelist)>0):?>
                                      <?php for($i=0;$i<=count($pricelist)-1;$i++):?>
                                         <td style="text-align: center;border-top: none;border-bottom: none;border-left:none;">
                                           <div class="btn btn-success btn-selected" id="<?=$pricelist[$i]["package_id"]?>">เลือก</div>
                                        </td>
                                  <?php endfor;?>
                                  <?php endif;?>
                                </tr>

                            </table>
                          </td>
                        
                        </tr>
                        
                      </table>

                          
                    </div>

                </div>
              </div>
            </div>
          </div>
    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs('
  var packageid = 0;
  var quotelist = [];
  $(function(){
         $(".btn-create-insure").click(function(){
             if(quotelist.length > 1){
                alert("เลือกรายการเกิน 1 รายการแล้ว");
                return;
            }else if(quotelist.length <=0){
                alert("เลือกอย่างน้อย 1 รายการ");
                return;
            }
            var packids = quotelist[0];
            alert(packids);
            var ids = "'.$model->id.'";
            alert(ids);
            swal({
                      title: "ต้องการสร้างใบแจ้งงานใช่หรือไม่",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                     }, function () {
                      $.ajax({
                          type: "POST",
                          dataType: "html",
                          url: "'.Url::toRoute(['/quotation/geninsure'], true).'",
                          data: {id: ids,packid: packids},
                          success: function(data){
                           // alert(data);return;
                            swal.close();
                           // alert(data);return;
                            if(data !=""){
                                swal({
                                      title: "สร้างใบแจ้งงานเลขที่ "+data,
                                      text: "",
                                      type: "info",
                                      showCancelButton: true,
                                      closeOnConfirm: false,
                                      showLoaderOnConfirm: true
                                     }, function () {
                                     });
                            }
                         }
                      });
                             
                });
        });
         $(".btn-selected").on("click",function(){

           
          $(this).toggleClass("btn-warning btn-success");

          if($.inArray($(this).attr("id"),quotelist) != -1){
            quotelist.splice(quotelist.indexOf($(this).attr("id")),1);
          }else{
            quotelist.push($(this).attr("id"));
          }
           // alert(quotelist.length);
        });
        
        $(".package-act").change(function(){
            var id = $(this).attr("id");
            var xid = id.substr(id.length -1, 1);
            var newid = "#package-amt-"+xid;
            var newtotal = "#package-total-"+xid;
            var amt = $(newid).val().replace(/,/g, "");

            var thisvalue = $(this).val().replace(/,/g, "");
            $(newtotal).val(parseFloat(parseFloat(amt) + parseFloat(thisvalue)).toFixed(2));
            //alert(amt);
        });
            $(".package-amt").change(function(){
            var id = $(this).attr("id");
            var xid = id.substr(id.length -1, 1);
            var newid = "#package-act-"+xid;
            var newtotal = "#package-total-"+xid;
            var amt = $(newid).val().replace(/,/g, "");

            var thisvalue = $(this).val().replace(/,/g, "");
            $(newtotal).val(parseFloat(parseFloat(amt) + parseFloat(thisvalue)).toFixed(2));
            //alert(amt);
        });
       
  });
   function checkcost(e){
            var id = e.attr("id");
            var xid = id.substr(id.length -1, 1);
            var minid = ".s_amt-"+xid;
            var maxid = ".n_amt-"+xid;
            
            var min = $(minid).val();
            var max = $(maxid).val();
           //  alert(max);
            if(e.val()>=min && e.val()<=max){

            }else{
              swal({
                      title: "ทุนประกันต้องอยู่ในช่วงทุนเท่านั้น",
                      text: "",
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                     }, function () {
                      swal.close();
                      e.val("0");
                     
                });
            }
   }
',static::POS_END);?>
