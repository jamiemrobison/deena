<?php
use yii\helpers\ArrayHelper;

?>
<tr id="ordered-protect-id-">
    <td>1</td>
    <td>
      <input type="text" class="form-control " name="protect[]" value="<?= $data["protect"];?>" disabled="disabled" />
      <input type="hidden" class="protectid" name="protectid[]" value="<?= $data["id"];?>"/>
    </td>
    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
    <td><input type="text" class="form-control description" name="description[]" value="<?= $data["description"];?>" /></td>
    
   <td><input type="text" class="form-control amount" name="amount[]" value="<?= $data["amount"];?>" /></td>
    
  <td class="action">
      <a class="btn btn-white remove-line" onClick="protectremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>
