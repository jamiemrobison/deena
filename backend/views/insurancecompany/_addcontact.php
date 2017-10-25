<?php
use yii\helpers\ArrayHelper;
use backend\models\Bank;
use yii\helpers\Html;
use backend\helpers\ContactType;

?>

<tr id="contact-row-id">
    <td>
    	<div class="section_txt">
    		<?= $data["contact_section"];?>
    	</div> 
      <input type="hidden" class="contact_section" name="contact_section[]" value="<?= $data["contact_section"];?>"/>
      <input type="hidden" class="id" name="id[]" value="<?= $data["id"];?>"/>
    </td>
    <td>
    	<div class="title_txt">
    	<?= $data["title_name"];?>
   		</div>
		<input type="hidden" class="contact_title" name="contact_title[]" value="<?= $data["contact_title"];?>"/>
    </td>
    <td>
    	<div class="name_txt">
    	<?= $data["name"];?>
    </div>
		<input type="hidden" class="contact_name" name="name[]" value="<?= $data["name"];?>"/>
    </td>
     <td>
      <div class="phone1_txt">
      <?= $data["phone1"];?>
    </div>
    <input type="hidden" class="phone1" name="phone1[]" value="<?= $data["phone1"];?>"/>
    <input type="hidden" class="phone2" name="phone2[]" value="<?= $data["phone2"];?>"/>
    </td>
     <td>
      <div class="email1_txt">
      <?= $data["email1"];?>
    </div>
    <input type="hidden" class="email1" name="email1[]" value="<?= $data["email1"];?>"/>
    <input type="hidden" class="email2" name="email2[]" value="<?= $data["email2"];?>"/>
    </td>
    
  <!--  <td>
   	 <div class="type_txt">
    	<?php //echo ContactType::getTypeById($data["contact_type_id"]);?>
	</div>
    <input type="hidden" class="contact_type_id"  name="contact_type_id[]" value="<?= $data["contact_type_id"];?>"/>
  </td>
   <td>
   	<div class="text_txt">
    	<?= $data["contact_txt"];?>
	</div>
    <input type="hidden" class="contact_txt" name="contact_txt[]" value="<?= $data["contact_txt"];?>"/>
  </td> -->
  
  <td class="action">
      <!-- <a class="btn btn-white remove-line" onClick="bankedit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a> -->
      <a class="btn btn-white remove-line" onClick="contactRemove($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
      <a class="btn btn-white edit-line" onClick="contactEdit($(this));" href="javascript:void(0);"><i class="fa fa-edit"></i></a>
    </td>
</tr>
