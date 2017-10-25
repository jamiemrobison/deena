<?php
use yii\helpers\ArrayHelper;
use backend\models\Bank;
use yii\helpers\Html;
use backend\helpers\BankAccountType;

?>

<tr id="insure-commission-id">
    <td>
      <div class="insure_txt">
      <?= $data["insure_text"];?>
    </div>
      <input type="hidden" class="insure_type" name="insure_type[]" value="<?= $data["id"];?>"/>
      <input type="hidden" class="commission_id" name="commission_id[]" value="<?= $data["id"];?>"/>
    </td>
    <td>
      <div class="promotion_txt">
      <?= $data["promotion"];?>
    </div>
    	<input type="hidden" class="promotion" name="promotion[]" value="<?= $data["promotion"];?>"/>
    </td>
     <td>
      <div class="disc_per_txt">
    <?= $data["disc_per"];?>
  </div>
    <input type="hidden" class="commission_per" name="commission_per[]" value="<?= $data["disc_per"];?>"/>
     </td>
      <td>
        <div class="amount_txt">
    <?= $data["amount"];?>
  </div>
    <input type="hidden" class="commission_amount" name="commission_amount[]" value="<?= $data["amount"];?>"/>
     </td>
  <td class="action">
      <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
      <a class="btn btn-white remove-line" onClick="commissionRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
      <a class="btn btn-white edit-line" onClick="commissionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
    </td>
</tr>
