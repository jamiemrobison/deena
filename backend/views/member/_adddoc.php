<?php
?>
<?php if(count($data)>0):?>
	<?php $i=0;?>
	<?php foreach($data as $value):?>
	<?php $i+=1;?>
		<tr id="<?=$value->id?>">
		        <td><?=$i?></td>
		        <td><?= \backend\helpers\FileCategory::getTypeById($value->doc_group_id)?></td>
		                              <td><?=$value->name?></td>
		        <td>
		        <a class="btn btn-white view-line" href="index.php?r=member/pdf&id=<?=$value->name?>" target="_blank"><i class="fa fa-eye"></i></a>
		        <a class="btn btn-white remove-line" onClick="removeDocref($(this));" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
		     </td>
		</tr>
	<?php endforeach;?>
<?php endif;?>