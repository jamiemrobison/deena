<?php
use yii\helpers\ArrayHelper;
use backend\helpers\ProtectTitle;
?>

<?php if(count($data)>0):?>
	<?php $i=0;?>
	<?php foreach($data as $value):?>
	<?php $i+=1;?>
		<tr id="ordered-protect-id-">
		    <td><?=$i;?></td>
		    <td>
		      <div class="coverage_txt">
		        <?=ProtectTitle::getTypeById($value->coverage_type);?>
		      </div>
		      <input type="hidden" class="protect" name="protect[]" value="<?= $value->coverage_type;?>" />
		      <input type="hidden" class="protectid" name="protectid[]" value="<?= $value->coverage_type;?>"/>
		    </td>
		    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
		    <td>
		      <div class="protect_txt">
		        <?=\backend\models\Actprotect::getActprotectname($value->actprotect_id);?>
		      </div>
		      <input type="hidden" class="actprotectid" name="actprotectid[]" value="<?= $value->actprotect_id;?>" />
		    </td>
		   <td>
		    <div class="amount_txt">
		       <?=$value->amount;?>
		    </div>
		    <input type="hidden" class="amount" name="amount[]" value="<?= $value->amount;?>" />
		  </td>
		    
		  <td class="action">
		      <a class="btn btn-white remove-line" onClick="protectremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
		     <a class="btn btn-white edit-line" onClick="protectEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
		    </td>
		</tr>
<?php endforeach;?>
<?php endif;?>
