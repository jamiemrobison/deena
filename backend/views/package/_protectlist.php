<?php ?>
<tr id="protect_list_id">
    <td>1</td>
    <td>
      <input type="text" class="form-control name" name="name[]" value="<?= $data["name"];?>" />
      <input type="hidden" class="package_id" name="package_id[]" value="<?= $data["package_id"];?>"/>
    </td>
    <td><input type="text" class="form-control description" name="description[]" value="<?= $data["description"];?>"/></td>
     <td><input type="number" class="form-control amount" name="amount[]" value="1" value="<?= $data["amount"];?>"/></td>
    <td class="action">
      <a class="btn btn-white edit-protect" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
      <a class="btn btn-white remove-protect" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
    </td>
</tr>