<?php
use yii\helpers\Url;
use kartik\file\Fileinput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

$this->title = 'อัพโหลดกระดานทุน';
?>
<form id="import-capital" action="<?=Url::to(['/capitalrange/index'],true)?>" enctype="multipart/form-data" method="post">
		<div class="panel">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
					<label class="control-label">ปีทุน</label>
					<input type="text" class="form-control" name="capital_year" required value=""/>
				</div>
			</div>
<div class="row">
	<div class="col-lg-6">
		<?php 
		 echo '<label class="control-label">บริษัทประกัน</label>';
			echo Select2::widget([
				'name'=>'company_id',
				'data'=>ArrayHelper::map(\backend\models\Insurancecompany::find()->all(),'id','name'),
				'options'=>['placeholder'=>'เลือกบริษัทประกัน'],
				'pluginOptions'=>[
					'allowClear'=>false,
				]
			]);
		?>
	</div>
</div><br />
<div class="row">
	<div class="col-lg-6">

			
                        <?php
                          echo '<label class="control-label">อัพโหลดไฟล์ Excel</label>';
                          echo FileInput::widget([
                                     'model' => $modelfile,
                                     'attribute' => 'file',
                                     //'name'=>'upload-capital',
                                     'options' => ['multiple' => false,'accept' => '.xlsx'],
                                      'pluginOptions' => [
                                         'showUpload'=>false,
                                        'maxFileCount'=>1,
                                       // 'uploadUrl' => Url::to(['/insurancecompany/importcapital']),
                                      ],
                                 ]);
                          echo "<br /><input type='submit' class='btn btn-success' value='อัพโหลด'/>";
                          
                        ?>
                      
		</div>	
	</div>
	</div>
	
</div>
</form>

<div class="row">
	<div class="col-lg-12">
		<div class="panel">
		<div class="panel-body">
			<?php if(count($model_company)>0):?>
			<?php foreach($model_company as $value):?>
			 <?php $url = \backend\models\Insurancecompany::getLogo($value->insure_company_id);?>
			<div class="row">
				<div class="col-lg-12">
					<div class="media">
					  <div class="media-left media-middle">
					    <a href="#">
					      <img class="media-object" src="../web/uploads/logo/<?=$url?>" style="width: 48px" alt="...">
					    </a>
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading"><?=\backend\models\Insurancecompany::getFullName($value->insure_company_id);?> <span><small><i class="fa fa-calendar"></i> <?=date('d-m-Y',$value->created_at)?> <i class="fa fa-clock-o"></i> <?=date('h:i',$value->created_at)?></small></span></h4>
					    <div class="btn btn-default text-danger"><i class="fa fa-trash"></i></div>
					    <div class="btn btn-default text-primary"><a href="<?=Url::to(['/capitalrange/view','id'=>$value->id,'company_id'=>$value->insure_company_id],true)?>"><i class="fa fa-eye"></i></a></div>
					  </div>
					</div>																	
				</div>	
			</div> <hr />
		<?php endforeach;?>
		<?php endif;?>
		</div>
		</div>
	</div>
</div>

