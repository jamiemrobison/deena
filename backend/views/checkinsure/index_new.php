<?php 
use backend\models\Carbrand;
use backend\models\Caryear;
use backend\models\Carinfo;
use backend\models\Car;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\Packagedetail;
use backend\models\Packagecondition;
use backend\models\Product;
use toxor88\switchery\Switchery;
use yii2mod\alert\Alert;

$this->title = "เช็คเบี้ยประกัน";
//$this->css = "<i class='fa-pencil-square-o'></i>";
$prod = Product::find()->where(['status'=> 1])->all();
$search = '';
if(isset($searchtype)){
   $search = $searchtype;
 }else{
  $search = 0;
 }
//echo $producttype;
?>

<div class="row">
	<div class="col-lg-5">

		<div class="nav-tabs-custom">
            <ul id="search_tab" class="nav nav-tabs">
              <li id="tab_car_year" class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-car text-danger"></i> ยี่ห้อรุ่นปีรถ</a></li>
              <li id="tab_car_code"><a href="#tab_2" data-toggle="tab"><i class="fa fa-check-square-o text-success"></i> รหัสรถ</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php $form = ActiveForm::begin(); ?>
                <input type="hidden" id="search_type" name="search_type" value="<?=$search?>" />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ยี่ห้อ</label>
                             <div class="col-sm-7">
                                <?php if(isset($brand)){$model->brand = $brand;}?>
                             <?= $form->field($model,'brand')->widget(Select2::className(),[
                                'data'=>ArrayHelper::map(Carbrand::find()->all(),'id','name'),
                                'options'=>['placeholder'=>'เลือกยี่ห้อ','id'=>'brand',
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
                                ])->label(false) ?>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">รุ่น</label>
                             <div class="col-sm-7">
                             <?= $form->field($model,'model')->widget(Select2::className(),[
                                'data'=>ArrayHelper::map(Carinfo::find()->all(),'id','model'),
                                'options'=>['placeholder'=>'เลือกรุ่น','disabled'=>'disabled','id'=>'car_model'],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                                ])->label(false) ?>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ปีรถ</label>
                             <div class="col-sm-7">
                                <?php if(isset($year)){$model->year = $year;}?>
                             <?= $form->field($model,'year')->widget(Select2::className(),[
                                'data'=>ArrayHelper::map(Caryear::find()->all(),'id','year_eng'),
                                'options'=>['placeholder'=>'เลือกปีรถ'],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                                ])->label(false) ?>
                             </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ผลิตภัณฑ์</label>
                             <div class="col-sm-7">
                                <?php if(isset($product)){$model->product = $product;}?>
                             <?= $form->field($model,'product')->widget(Select2::className(),[
                                'data'=>ArrayHelper::map($prod,'id',function($data){
                                    return $data->product_code." ".$data->name;
                                }),
                                'options'=>['placeholder'=>'เลือกผลิตภัณฑ์',
                                ],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                                ])->label(false) ?>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">รวม พรบ.</label>
                             <div class="col-sm-7">
                               <?php //echo $form->field($model, 'include_act')->widget(Switchery::className(),['options'=>['label'=>'']])->label(false) ?>
                             </div>
                        </div>
                    </div>
                </div> -->
                <br />
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"></label>
                             <div class="col-sm-7">
                             <input type="submit" value="ค้นหา" name="search" class="btn btn-primary" />
                             <!-- <div class="btn btn-default btn-quotation"><i class="fa fa-print"></i> สร้างใบเสนอราคา</div> -->
                             </div>
                        </div>
                    </div>
                </div>
                
                <?php ActiveForm::end();?>
              </div>
               <div class="tab-pane" id="tab_2">
                <?php $form = ActiveForm::begin(['id'=>'by_type'])?>
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">รหัสรถ</label>
                             <div class="col-sm-7">
                                <?= $form->field($model2, 'carcode')->widget(Select2::className(),[
                                      'data'=> ArrayHelper::map(\backend\models\Car::find()->where(['status'=>1])->all(),"id",function($data){
                                        return $data->car_code." ".$data->name;
                                      }),
                                      'options'=>['placeholder'=>'เลือกประเภทรถ','id'=>'carcode',
                                          'onchange'=>'
                                            $.post("index.php?r=car/showact&id=' . '"+$(this).val(),function(data){
                                              // $("select#carcode").html(data);
                                              // $("select#carcode").prop("disabled","");
                                            });
                                          '
                                      ],
                                      'pluginOptions'=>[
                                        'allowClear'=> true,
                                      ]
                                 ])->label(false) ?>
                             </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                         <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;">ประเภทประกัน</label>
                             <div class="col-sm-7">
                                <?php if(isset($producttype)){$model2->producttype = $producttype;}?>
                             <?= $form->field($model2,'producttype')->widget(Select2::className(),[
                                'data'=>ArrayHelper::map($prod,'id',function($data){
                                    return $data->product_code." ".$data->name;
                                }),
                                'options'=>['placeholder'=>'เลือกผลิตภัณฑ์',
                                    'onchange'=>'alert($(this).val())'
                                ],
                                 'pluginOptions'=>[
                                    'allowClear'=> true,
                                ]
                                ])->label(false) ?>
                             </div>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"></label>
                             <div class="col-sm-7">
                             <input type="submit" value="ค้นหา" name="search" class="btn btn-success" />
                            <!--  <div class="btn btn-default btn-quotation"><i class="fa fa-print"></i> สร้างใบเสนอราคา</div> -->
                             </div>
                        </div>
                    </div>
                </div>
                  <?php ActiveForm::end(); ?>
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                             <label class="control-label col-sm-3" for="name" style="bottom: -5px;text-align: right;"></label>
                             <div class="col-sm-7">
                            <!--  <input type="submit" value="ค้นหา" name="search" class="btn btn-primary" /> -->
                             <div class="btn btn-default btn-quotation"><i class="fa fa-print"></i> สร้างใบเสนอราคา</div>
                             </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>

      
	</div>
	<div class="col-lg-7">
		<?php if(count($modellist)>0):?>
  
			<?php for($i=0;$i<=count($modellist)-1;$i++):?>
     
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel">
						    <div class="panel-heading" role="tab" id="heading-<?=$i?>">
						    	<div class="row">
						    		<div class="col-lg-1">
						    			<?php echo Html::img('@web/uploads/logo/'.$modellist[$i]['logo'],['class'=>'img-logo'])?>
						    		</div>
						    		<div class="col-lg-6">
						    			<div class="media">
											  <div class="media-left">
											     
											  </div>
											  <div class="media-body">
											    <h3 class="media-heading">
											    	<?=$modellist[$i]['insure_name']?>
											    </h3>
											    
											    <span><div class="label label-primary">ซ่อมอู่</div> <?=$modellist[$i]['package_code']." ".$modellist[$i]['package_name']?></span>
											    <h5>
											        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-<?=$i?>" aria-expanded="true" aria-controls="collapse-<?=$i?>">
											          <i class="fa fa-caret-down"></i> ดูรายละเอียด
											        </a>
											     </h5>
											  </div>
											
										</div>
						    		</div>
						    		<div class="col-lg-2">
						    			<h3><b><span style="color: #FF9933;"><?=$modellist[$i]['alltotal']==''?0:number_format($modellist[$i]['alltotal'],0)?> บาท </span></b></h3>
						    		</div>
						    		<div class="col-lg-2">
						    			<span id="<?=$modellist[$i]['id']?>" style="margin-top: 20px;" class="btn btn-warning btn-quote" >
					          				<i class="fa fa-edit"></i> <span id="quote_txt">เสนอราคา</span>
					          			</span>
						    		</div>
						    	</div>
						    </div>
						    <div id="collapse-<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?=$i?>">
						      <div class="panel-body">
						      		<div class="row">
						            	<div class="col-lg-2">
						            		<h5><u><?= Product::getProdcode($modellist[$i]['insure_type'])?></u></h5>
						            	</div>
						            	<div class="col-lg-5">
						            		<h5><u>ความคุ้มครอง</u></h5>
						            	</div>
						            	<div class="col-lg-5">
						            		<h5><u>เงื่อนไข</u></h5>
						            	</div>
						            </div>
						            <div class="row">
						            	<div class="col-lg-2">
						            		<h5><u></u></h5>
						            	</div>
						            	<div class="col-lg-5">
						            		<table class="table">
						            			<?php 
						            			    $modelprotect = Packagedetail::find()->where(['package_id'=>$modellist[$i]['id']])->all();
						            			    $x = 0;
						            			?>
						            			<?php foreach ($modelprotect as $value):?>

						            			<tr>
						            				<td>
						            					<?php $x+=1;echo $x.".";?>
						            				</td>
						            				<td>
						            					<?php if($value->actprotect_id!='')echo $value->actprotect->name;?>
						            				</td>
						            				<td>
						            					<?php echo number_format($value->amount);?>
						            				</td>
						            			</tr>
						            			<?php endforeach;?>
						            		</table>
						            	</div>
						            	<div class="col-lg-5">
						            		<table class="table">
						            			<?php 
						            			    $modelcondition = Packagecondition::find()->where(['package_id'=>$modellist[$i]['id']])->all();
						            			    $x = 0;
						            			   // echo count($modelprotect);
						            			?>
						            			<?php foreach ($modelcondition as $value):?>

						            			<tr>
						            				<td style="width: 5%;">
						            					<?php $x+=1;echo $x.".";?>
						            				</td>
						            				<td>
						            					<?php echo \backend\helpers\ConditionTitle::getTypeById($value->title_id);?>
						            				</td>
						            				<td>
						            					<?php echo $value->condition_text;?>
						            				</td>
						            				
						            			</tr>
						            			<?php endforeach;?>
						            		</table>
						            	</div>
						            </div>
						      </div>
						    </div>
						  </div>
						</div>
				<?php endfor;?>
			<?php elseif(isset($brand)&&!empty($brand)):?>
		            <div class="data-not-found" style="padding: 20px 20px 20px 20px">
		            	<div class="alert-danger" style="padding: 20px 20px 20px 20px; text-align: center">
		            		<p><h3><i class="fa fa-info-circle"></i> ไม่พบข็อมูล</h3></p>
		            	</div>
		            </div>
	  	<?php endif;?>
	</div>
	
</div>

<?php $this->registerCss('
	.img-logo{
		width: 100%
	}
	.btn-quote{
		 	display: inline-block;
		  vertical-align: middle;
		  line-height: normal;
	}
	'
);?>


<?php $this->registerJs('
	var quotelist = [];

	$(function(){

      var hasbrand = "'.$brand.'";
      if(hasbrand > 0){
        $("#brand").trigger("change");
      }

      if($("#search_type").val() == "0"){
        $("#tab_car_year").addClass("active");
        $("#tab_car_code").removeClass("active");
        $("#tab_1").addClass("active");
        $("#tab_2").removeClass("active");
       
      }else{
        $("#tab_car_code").addClass("active");
        $("#tab_car_year").removeClass("active");
        $("#tab_1").removeClass("active");
        $("#tab_2").addClass("active");

      }
      $("#tab_car_year").click(function(){
        $("#search_type").val(1);
         $(".result").hide();
      });
       $("#tab_car_code").click(function(){
        $("#search_type").val(1);
         $(".result").hide();
      });
        $(".btn-quotation").hide();
      		var x = "'.$carmodel.'";
        	if(x!=""){
        		$("#car_model").prop("disabled","");
        	}
      	});

    $(".btn-quote").on("click",function(){
    	// $(this).removeClass("btn-warning");
    	// $(this).addClass("btn-success");
        if(quotelist.length > 3){
            alert("เลือกรายการเกิน 3 รายการแล้ว");
        }
    	$(this).toggleClass("btn-warning btn-success");
    	if($(this).find("#quote_txt").text() ==  "เสนอราคา"){
    		$(this).find("#quote_txt").text("เลือกแล้ว");
    		quotelist.push($(this).attr("id"));
    	}else{
    		$(this).find("#quote_txt").text("เสนอราคา");
    		quotelist.splice(quotelist.indexOf($(this).attr("id")),1);
    	}
    	if(quotelist.length > 0){
            $(".btn-quotation").show();
        }else{
            $(".btn-quotation").hide();
        }
       // alert(quotelist.length);
    });
    
    $(".btn-quotation").click(function(){
        alert();
        if(quotelist.length <= 0){return;}
        var Url = "'.Yii::$app->getUrlManager()->createUrl("checkinsure/genquotation").'";
        $(".list").val(quotelist);
        $("form#show_quotation").submit();
    });
	
',static::POS_END);?>