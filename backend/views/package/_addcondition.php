<?php
use yii\helpers\ArrayHelper;

?>
<tr id="ordered-condition-id-">
    <td>1</td>
    <td>
      <input type="text" class="form-control " name="condition[]" value="<?= $data["condition"];?>" disabled="disabled" />
      <input type="hidden" class="conditionid" name="conditionid[]" value="<?= $data["id"];?>"/>
    </td>
    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
    <td><input type="text" class="form-control desc_condition" name="desc_condition[]" value="<?= $data["desc_condition"];?>" /></td>
    
    
  <td class="action">
      <a class="btn btn-white remove-line" onClick="conditionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>
