<?php
use yii\helpers\ArrayHelper;
use backend\models\Bank;
use yii\helpers\Html;
use backend\helpers\BankAccountType;

?>

<tr id="shop-bank-id">
    <td>
      <div class="logo_txt">
      <?= Html::img('@web/uploads/logo/'.Bank::getLogo($data["id"]),['style'=>'width: 100%;']);?>
    </div>
      <input type="hidden" class="bank_id" name="bank_id[]" value="<?= $data["id"];?>"/>
    </td>
    <td>
      <div class="bank_name_txt">
      <?= $data["bank_name"];?>
  
    </div>
    </td>
    <td>
      <div class="bank_short_name_txt">
      <?= Bank::getBankshortname($data["id"]);?>
      </div>
    </td>
    
   <td>
    <div class="account_no_txt">
    <?= $data["account_no"];?>
  </div>
    <input type="hidden" class="account_no" name="account_no[]" value="<?= $data["account_no"];?>"/>
  </td>
   <td>
    <div class="brance_txt">
    <?= $data["brance"];?>
  </div>
    <input type="hidden" class="brance" name="brance[]" value="<?= $data["brance"];?>"/>
  </td>
  <td>
    <div class="account_type_txt">
    <?= BankAccountType::getTypeById($data["account_type"]);?>
  </div>
    <input type="hidden" class="account_type" name="account_type[]" value="<?= $data["account_type"];?>"/>
  </td>
    
  <td class="action">
      <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
      <a class="btn btn-white remove-line" onClick="bankRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
      <a class="btn btn-white edit-line" onClick="bankEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
    </td>
</tr>
