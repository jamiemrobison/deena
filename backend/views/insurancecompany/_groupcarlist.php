<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Carinfo;

?>
	<?php if(count($brand)>0):?>
	<?php for($i=0;$i<=count($brand)-1;$i++):?>
		<tr>
			<td>
				<div class="id_text">
					<?php //echo $i+1;?>
				</div>
			</td>	
			<td>
				<div class="name_text">
					<?= Carinfo::findBrand($brand[$i])?>
				</div>
			</td>	
			<td>
				<div class="desc_text">
					<?php if(count($carlist)>0):?>
					<?php $list = '';?>
					   <?php for($x=0;$x<=count($carlist)-1;$x++):?>

					   <?php 
					    if($x==0){
					    	$list = Carinfo::findCarmodel($carlist[$x]);
					    }else{
					    	$list.= ",".Carinfo::findCarmodel($carlist[$x]);
					    }
					   
					     ?>
					<?php endfor;?>
					<?php  echo $list;?>
					<?php endif;?>
				</div>
			</td>	
			<td>
				<a class="btn btn-white remove-line" onClick="carlistRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
      			<a class="btn btn-white edit-line" onClick="carlistEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
			</td>	
		</tr>
	<?php endfor;?>
	<?php endif;?>
