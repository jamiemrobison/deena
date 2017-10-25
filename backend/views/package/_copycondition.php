<?php
use yii\helpers\ArrayHelper;
use backend\helpers\ConditionTitle;
?>
<?php if(count($data)>0):?>
	<?php $i=0;?>
	<?php foreach($data as $value):?>
	<?php $i+=1;?>
		<tr id="ordered-condition-id-">
		    <td><?=$i?></td>
		    <td>
		      <div class="condition_txt">
		        <?= ConditionTitle::getTypeById($value->title_id);?>
		      </div>
		      <input type="hidden" class="conditionid" name="conditionid[]" value="<?= $value->title_id;?>"/>
		    </td>
		    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
		    <td>
		      <div class="desc_txt">
		         <?= $value->condition_text;?>
		      </div>
		      <input type="hidden" class="desc_condition" name="desc_condition[]" value="<?=$value->condition_text;?>"/>
		    </td>
		    
		    
		  <td class="action">
		      <a class="btn btn-white remove-line" onClick="conditionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
		      <a class="btn btn-white edit-line" onClick="conditionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
		    </td>
		</tr>
<?php endforeach;?>
<?php endif;?>
