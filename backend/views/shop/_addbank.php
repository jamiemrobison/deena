<?php
use yii\helpers\ArrayHelper;
use backend\models\Bank;
use yii\helpers\Html;

?>

<tr id="shop-bank-id">
    <td>
      <?= Html::img('@web/uploads/logo/'.Bank::getLogo($data["id"]),['style'=>'width: 100%;']);?>
      <input type="hidden" class="bank_id" name="bank_id[]" value="<?= $data["id"];?>"/>
    </td>
    <td><?= $data["bank_name"];?></td>
    
   <td>
    <?= $data["account_no"];?>
    <input type="hidden" class="account_no" id="account_no" name="account_no[]" value="<?= $data["account_no"];?>"/>
  </td>
   <td>
    <?= $data["brance"];?>
    <input type="hidden" class="brance" name="brance[]" value="<?= $data["brance"];?>"/>
  </td>
    
  <td class="action">
      <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
      <a class="btn btn-white remove-line" onClick="bankRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>
