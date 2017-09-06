<?php
use yii\helpers\ArrayHelper;
use backend\models\Bank;
use yii\helpers\Html;
use backend\helpers\BankAccountType;

?>

<tr id="insure-commission-id">
    <td>
      <?= $data["insure_text"];?>
      <input type="hidden" class="commission_id" name="commission_id[]" value="<?= $data["id"];?>"/>
    </td>
    <td><?= $data["promotion"];?>
    	<input type="hidden" class="promotion" name="promotion[]" value="<?= $data["promotion"];?>"/>
    </td>
     <td>
    <?= $data["disc_per"];?>
    <input type="hidden" class="commission_per" name="commission_per[]" value="<?= $data["disc_per"];?>"/>
     </td>
      <td>
    <?= $data["amount"];?>
    <input type="hidden" class="commission_amount" name="commission_amount[]" value="<?= $data["amount"];?>"/>
     </td>
  <td class="action">
      <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
      <a class="btn btn-white remove-line" onClick="commissionRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>
