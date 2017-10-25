<?php
use yii\helpers\ArrayHelper;

?>
<tr id="ordered-condition-id-">
    <td>1</td>
    <td>
      <div class="condition_txt">
        <?= $data["condition"];?>
      </div>
      <input type="hidden" class="conditionid" name="conditionid[]" value="<?= $data["id"];?>"/>
    </td>
    <!-- <td><input type="text" class="form-control name" name="name[]" value="<?php //echo $data["name"];?>" disabled="disabled" /></td> -->
    <td>
      <div class="desc_txt">
         <?= $data["id"]==2?$data["yesno"]:$data["desc_condition"];?>
      </div>
      <input type="hidden" class="desc_condition" name="desc_condition[]" value="<?= $data["id"]==2?$data["yesno"]:$data["desc_condition"];?>"/>
    </td>
    
    
  <td class="action">
      <a class="btn btn-white remove-line" onClick="conditionremove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
      <a class="btn btn-white edit-line" onClick="conditionEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
    </td>
</tr>
