<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>
	<?php if(count($data)>0):?>
	<?php $i=0;?>
	<?php foreach($data as $value):?>
	<?php $i+=1;?>
		<tr>
			<td>
				<div class="id_text">
					<?=$i;?>
				</div>
			</td>	
			<td>
				<div class="name_text">
					<?=$value->name?>
				</div>
			</td>	
			<td>
				<div class="desc_text">
					<?=$value->description?>
				</div>
			</td>	
			<td>
				<a class="btn btn-white remove-line" onClick="cargroupRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
      			<a class="btn btn-white edit-line" onClick="cargroupEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
			</td>	
		</tr>
	<?php endforeach;?>
	<?php endif;?>
