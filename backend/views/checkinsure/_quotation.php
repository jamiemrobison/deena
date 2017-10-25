<?php

use yii\helpers\Html;


 ?>

<div class="quotation">
	<table style="width: 100%" class="table table-striped">
		<tr style="width: 100%">
			<td  style="width: 70%">
				<p><h2>ดีน่าโบรคเกอร์</h2></p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td style="width: 30%">
				<?php echo Html::img('@web/uploads/logo/DEENA_LOGO.png')?>
			</td>
		</tr>
		<tr>
			<td>
				<p>9/21 ซอยเพชรเกษม 77 ถนนเพชรเกษม </p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
				<p><h2>ใบเสนอราคา</h2></p>
			</td>
		</tr>
		<tr>
			<td>
				<p>แขวงหนองค้างพลู เขตหนองแขม กทม 10160</p>
			</td>
			<td>
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
				<p>ใบอนุญาติเลขที่  5204012862</p>
			</td>
			<td>
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
				<p>โทร. 089 921 3825, 082 998 5001</p>
			</td>
			<td>
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
				<p>Email : nmichel99999@hotmail.com</p>
			</td>
			<td>
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
				<p>Line :  linkuv</p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
				<p><h3> รหัสสมาชิก : M0000030</h3></p>
			</td>
		</tr>
		<tr>
			<td>
				<p></p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
				<p><h3> เลขที่ : Q000001</h3></p>
			</td>
		</tr>
		<tr>
			<td>
				<p>เรียน ท่านเจ้าของรถ</p>
			</td>
			<td>
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
				<p>ทะเบียนรถ</p>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td colspan="5">
				<table>
				  <tr>
					<td>
						<p>รหัสรถ :</p>
					</td>
					<td>
						<p>ยี่ห้อ : Mitsubishi</p>
					</td>
					<td>
						<p>รุ่น : Triton </p>
					</td>
					<td>
						<p>ปี : 2016</p>
					</td>
					<td>
					</td>
				</tr>
				</table>			
			</td>
			
		</tr>
		<tr>
			<td colspan="5">
				<p>อุปกรณ์เสริม :</p>
			</td>
		
		</tr>
		<tr>
			<td colspan="5">
				<p>หมายเหตุ :</p>
			</td>
		
		</tr>
		<tr>
			<td colspan="5">
				<p>ขอนำเสนอเบี้ยประกันภัยสำหรับท่านตามรายละเอียดข้างล่างนี้ :</p>
			</td>
		
		</tr>
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
						<!-- <td style="background-color:pink;padding: 5px;text-align: center;border-bottom: none;width:20%;">
							คุ้มภัย
						</td>
						<td style="background-color:pink;padding: 5px;text-align: center;border-bottom: none;width:20%;">
							เทเวศน์
						</td>
						<td style="background-color:pink;padding: 5px;text-align: center;border-bottom: none;width:20%;">
							อลิอันซ์
						</td> -->
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
						
						<!-- <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-bottom: none;">
							อู่
						</td>
						<td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-bottom: none;">
							อู่
						</td>
						<td style="background-color:pink;padding: 5px;text-align: center;border-top: none;border-bottom: none;">
							อู่
						</td>  -->
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
						<!-- <td style="background-color:pink;padding: 5px;text-align: center;border-top: none;">
							2+
						</td>
						<td style="background-color:pink;padding: 5px;text-align: center;border-top: none;">
							2+
						</td>
						<td style="background-color:pink;padding: 5px;text-align: center;border-top: none;">
							3
						</td> -->
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
					<!-- <tr>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							ความเสียหายต่อชีวิต ร่ายกายหรืออนามัย/คน
						</td>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							1,000,000
						</td>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							1,000,000
						</td>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							1,000,000
						</td>
					</tr>
					<tr>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							ความเสียหายต่อชีวิต ร่ายกายหรืออนามัย/ครั้ง
						</td>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							10,000,000
						</td>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							10,000,000
						</td>
						<td style="text-align: left;border-top: none;border-bottom: none;padding-left: 10px;">
							10,000,000
						</td>
					</tr> -->



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
							   		<?= number_format($pricelist[$i]['alltotal'])?>
								</td>
						      <?php endfor;?>
							<?php endif;?>

						</tr>
						<tr>
							<td style="text-align: left;border-top: none;border-bottom: none;border-left:none;">
							   พรบ
							</td>
						</tr>
						<tr>
							<td style="text-align: center;border-top: none;border-bottom: none;border-left:none;">
							   ราคา เบี้ยประกัน + พรบ.
							</td>
						</tr>

				</table>
			</td>
		
		</tr>
		
	</table>

			
</div>


