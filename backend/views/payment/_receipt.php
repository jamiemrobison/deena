<?php

use yii\helpers\Html;


 ?>
<?php $this->registerCss(
      '  body {      
            font-family: Verdana;
        }
         
        div.invoice {
        border:1px solid #ccc;
        padding:10px;
        height:740pt;
        width:570pt;
        }
 
        div.company-address {
            border:1px solid #ccc;
            float:left;
            width:200pt;
        }
         
        div.invoice-details {
            border:1px solid #ccc;
            float:right;
            width:200pt;
        }
         
        div.customer-address {
            border:1px solid #ccc;
            float:right;
            margin-bottom:50px;
            margin-top:100px;
            width:200pt;
        }
         
        div.clear-fix {
            clear:both;
            float:none;
        }
         
        table {
            width:100%;
        }
         
        th {
            text-align: left;
        }
         
        td {
        }
         
        .text-left {
            text-align:left;
        }
         
        .text-center {
            text-align:center;
        }
         
        .text-right {
            text-align:right;
        }
         '
);?>
<div class="receipt">
	<table style="width: 100%" class="table table-striped table-bordered">
		<tr style="width: 100%">
			<td style="width: 30%">
				<?php echo Html::img('@web/uploads/logo/DEENA_LOGO.png')?>
			</td>
			<td  style="width: 70%">
				<p><h2>ดีน่าโบรคเกอร์</h2></p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			
		</tr>
		<tr>
			
			<td>
			</td>
			<td col-span="4">
				<p>44/170 ปริญลักษณ์ เพชรเกษม 69 แขวงหนองแขม เขตหนองแขม กรุงเทพฯ 10160 </p>
			</td>
			
		</tr>
		<tr>
			
			<td>
			</td>
			<td>
				<p></p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			
			<td>
			</td>
			<td>
				<p>โทร. 089 921 3825, 082 998 5001, 090 012 5527 </p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			
			<td>
			</td>
			<td>
				<p>เลขประจำตัวผู้เสียภาษี</p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		
		<tr>
			
			<td col-span="5">
			</td>
	
		</tr>
			<tr>
			
			<td col-span="5">
			</td>
	
		</tr>
		<tr>
			<td colspan="5" style="text-align: center;">
			   <h2>ใบรับเงิน</h2>
			</td>
			
		</tr>
		<tr>
			<td colspan="5">
				<table width="100%">
				<tr>
					<td style="width:40%">
						วันที่ : <?=date('d-m-Y',$model->created_at);?>
					</td>
					<td style="width:40%;">
					</td>
					<td style="width:60%">
						เลขที่ใบรับเงิน : <?=$model->payment_code;?>
					</td>
				</tr>
				<tr>
					<td style="width:40%">
						ชื่อผู้รับ : <?=$model_insure->fname.' '.$model_insure->lname;?>
					</td>
					<td style="width:50%;">
					</td>
					<td style="width:30%">
						
					</td>
				</tr>
				<tr>
					<td style="width:40%">
						ที่อยู่ : <?=$model_insure->address." ".\backend\models\Insurance::getDistrictName($model_insure->district)." ".\backend\models\Insurance::getCityName($model_insure->city)." ".\backend\models\Insurance::getProvinceName($model_insure->province);?>
					</td>
					<td style="width:50%;">
					</td>
					<td style="width:30%">
					
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
				<tr>
					<td style="width:40%">
						อ้างถึง
					</td>
					<td style="width:50%;">
					</td>
					<td style="width:30%">
						ทะเบียนรถ : <?=$model_insure->plate_category." ".$model_insure->plate_license." ".\backend\models\Insurance::getPlateinfo($model_insure->plate_province,3)?>
					</td>
				</tr>
				<tr>
					<td style="width:40%">
						เลขที่รับแจ้ง : <?=$model_insure->insure_code;?>
					</td>
					<td style="width:50%;">
					</td>
					<td style="width:30%">
						เลขกรมธรรม์ : <?=$model_insure->insure_no;?>
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
				<tr>
					<td colspan="5">
						<table class="table_bordered" width="100%">
							<tr style="background-color: #ccc;">
								<td style="width: 5%;text-align: center;border-right: 1px solid;"><b>ที่</b></td>
								<td style="width: 75%;text-align: center;border-right: 1px solid;"><b>รายละเอียด</b></td>
								<td style="width: 20%;text-align: center;"><b>จำนวนเงิน</b></td>
							</tr>
							<tr>
								<td style="width: 5%;text-align: center;border-right: 1px solid;border-top: 1px solid;">1</td>
								<td style="width: 75%;text-align: left;border-right: 1px solid;border-top: 1px solid;">ค่าเบี้ยประกันภัย </td>
								<td style="width: 20%;text-align: center;border-top: 1px solid;"><?=number_format($model_insure->grand_total,2)?></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: right;border-right: 1px solid;border-top: 1px solid;"><b>รวมทั้งสิ้น<br /></td>
								<td style="width: 20%;text-align: center;border-top: 1px solid;"><?=number_format($model_insure->grand_total,2)?></td>
							</tr>

						</table>
						<table class="table_bordered" width="100%">
							<tr>
								<td style="width: 50%;height: 150px;text-align: left;vertical-align: text-top;border-right: 1px solid;">ผู้รับเงิน</td>
								<td style="width: 50%;height: 150px;text-align: left;vertical-align: text-top;border-right: 1px solid;">ผู้ตรวจสอบ</td>
								
							</tr>
							
						</table>
					</td>
				</tr>
				

			</table>	
			
			</td>
			
		</tr>
		<tr>
			
		</tr>
		
	</table>

			
</div>


