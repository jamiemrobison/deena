<?php
use yii\helpers\ArrayHelper;

?>
<?php if(count($data)>0):?>
	<?php foreach($data as $value):?>
		<tr id="ordered-protect-id-">
		   <td>1</td>
		    <td>
		      <div class="code_txt">
		        <?=$value->code;?>
		      </div>
		      <input type="hidden" class="promot_code" name="promot_code[]" value="<?= $value->code;?>" />
		      <input type="hidden" class="promot_id" name="promot_id[]" value="<?= $value->id;?>"/>
		    </td>
		    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
		    <td>
		      <div class="promot_name_txt">
		        <?=$value->name;?>
		      </div>
		    </td>
		     <td>
		      <div class="promot_desc_txt">
		        <?=$value->description;?>
		      </div>
		    </td>
		   <td>
		    <div class="promot_amount_txt">
		       <?=$value->amount;?>
		    </div>
		  </td>
		    
		  <td class="action">
		      <a class="btn btn-white remove-line" onClick="promotionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
		     <!-- <a class="btn btn-white edit-line" onClick="promotionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
		    </td>
		</tr>
	<?php endforeach;?>
<?php endif;?>

