<?php
use yii\helpers\ArrayHelper;
use backend\models\Bank;
use yii\helpers\Html;
use backend\helpers\BankAccountType;

?>
<?php if(count($data)>0):?>
	<?php foreach($data as $value):?>
		<tr id="insure-commission-id">
		    <td>
		      <div class="insure_txt">
		      <?= \backend\models\Product::getProdcode($value->insure_type);?>
		    </div>
		      <input type="hidden" class="insure_type" name="insure_type[]" value="<?= $value->insure_type;?>"/>
		      <input type="hidden" class="commission_id" name="commission_id[]" value="<?= $value->insure_type;?>"/>
		    </td>
		    <td>
		     <div class="promotion_txt">
		     <?= $value->promotion_name;?>
		    </div>
		    	<input type="hidden" class="promotion" name="promotion[]" value="<?= $value->commission_percent;?>"/>
		    </td>
		     <td>
		      <div class="disc_per_txt">
		    <?= number_format($value->commission_percent);?>
		  </div>
		    <input type="hidden" class="commission_per" name="commission_per[]" value="<?= $value->commission_percent;?>"/>
		     </td>
		      <td>
		        <div class="amount_txt">
		     <?= number_format($value->commission_amont);?>
		  </div>
		    <input type="hidden" class="commission_amount" name="commission_amount[]" value="<?= $value->commission_amont;?>"/>
		     </td>
		  <td class="action">
		      <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
		      <a class="btn btn-white remove-line" onClick="commissionRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
		      <a class="btn btn-white edit-line" onClick="commissionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
		    </td>
		</tr>
<?php endforeach;?>
<?php endif;?>
