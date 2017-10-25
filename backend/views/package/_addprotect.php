<?php
use yii\helpers\ArrayHelper;

?>
<tr id="ordered-protect-id-">
    <td>1</td>
    <td>
      <div class="coverage_txt">
        <?=$data["protect"];?>
      </div>
      <input type="hidden" class="protect" name="protect[]" value="<?= $data["protect"];?>" />
      <input type="hidden" class="protectid" name="protectid[]" value="<?= $data["id"];?>"/>
    </td>
    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
    <td>
      <div class="protect_txt">
        <?=$data["description_txt"];?>
      </div>
      <input type="hidden" class="actprotectid" name="actprotectid[]" value="<?= $data["description"];?>" />
    </td>
   <td>
    <div class="amount_txt">
       <?=$data["amount"];?>
    </div>
    <input type="hidden" class="amount" name="amount[]" value="<?= $data["amount"];?>" />
  </td>
    
  <td class="action">
      <a class="btn btn-white remove-line" onClick="protectremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
     <a class="btn btn-white edit-line" onClick="protectEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
    </td>
</tr>
