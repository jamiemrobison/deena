<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;

use bookin\aws\checkbox\AwesomeCheckbox;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="userrole-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-lg-6">

                  <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                  <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']]) ?>

                </div>
                <div class="col-lg-6">

                </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr style="background: #ccc;text-color: #fff">
                          <th style="widht: 60%;text-align: center;">ชื่อเมนู</th>
                          <th style="widht: 10%;text-align: center;">Full</th>
                          <th style="widht: 10%;text-align: center;">Create</th>
                          <th style="widht: 10%;text-align: center;">View</th>
                          <th style="widht: 10%;text-align: center;">Modified</th>
                          <th style="widht: 10%;text-align: center;">Delete</th>
                          <th style="widht: 10%;text-align: center;">Approve</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;?>
                        <?php if(!$model->isNewRecord && count($listmenu_select)>0):?>
                            <?php foreach($listmenu_select as $value):?>
                                 <?php $i+=1;?>
                                <tr>
                                 <td><?= \backend\models\Menu::findMenuName($value->menu_id)?></td>
                                 <td style="widht: 10%;text-align: center;">
                                  <input type="hidden" class="" name="menuid[]" value="<?=$value->menu_id;?>"/> 
                                  <input type="hidden" class="input_is_full" name="is_full[]" value="<?=$value->is_full?>"/> 
                                   <?= AwesomeCheckbox::widget([
                                        'name'=>'test',
                                        'id'=>'is_full-'.$i,
                                        'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                        'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                        'checked' => $value->is_full?true:false,
                                        'options'=>[
                                            'label'=>' ',
                                            'onclick'=>'rowallcheck($(this))',

                                        ]
                                    ]);?>
                                  </td>
                                  <td style="widht: 10%;text-align: center;">
                                    <input type="hidden" class="input_is_create" name="is_create[]" value="<?=$value->is_create?>"/> 
                                   <?= AwesomeCheckbox::widget([
                                        'name'=>'test',
                                        'id'=>'is_create-'.$i,
                                        'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                        'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                        'checked' => $value->is_create?true:false,
                                        'options'=>[
                                            'label'=>' ',
                                            'onclick'=>'rowcheck($(this))',
                                        ]
                                    ]);?>
                                  </td>
                                  <td style="widht: 10%;text-align: center;">
                                    <input type="hidden" class="input_is_view" name="is_view[]" value="<?=$value->is_view?>"/> 
                                   <?= AwesomeCheckbox::widget([
                                        'name'=>'test',
                                        'id'=>'is_view-'.$i,
                                        'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                        'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                        'checked' => $value->is_view?true:false,
                                        'options'=>[
                                            'label'=>' ',
                                            'onclick'=>'rowcheck($(this))',
                                        ]
                                    ]);?>
                                  </td>
                                  <td style="widht: 10%;text-align: center;">
                                    <input type="hidden" class="input_is_modified" name="is_modified[]" value="<?=$value->is_update?>"/> 
                                   <?= AwesomeCheckbox::widget([
                                        'name'=>'test',
                                        'id'=>'is_modified-'.$i,
                                        'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                        'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                        'checked' => $value->is_update?true:false,
                                        'options'=>[
                                            'label'=>' ',
                                            'onclick'=>'rowcheck($(this))',
                                        ]
                                    ]);?>
                                  </td>
                                  <td style="widht: 10%;text-align: center;">
                                    <input type="hidden" class="input_is_delete" name="is_delete[]" value="<?=$value->is_delete?>"/> 
                                   <?= AwesomeCheckbox::widget([
                                        'name'=>'test',
                                        'id'=>'is_delete-'.$i,
                                        'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                        'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                        'checked' => $value->is_delete?true:false,
                                        'options'=>[
                                            'label'=>' ',
                                            'onclick'=>'rowcheck($(this))',
                                        ]
                                    ]);?>
                                  </td>
                                  <td style="widht: 10%;text-align: center;">
                                    <input type="hidden" class="input_is_approve" name="is_approve[]" value="<?=$value->is_approve?>"/> 
                                   <?= AwesomeCheckbox::widget([
                                        'name'=>'test',
                                        'id'=>'is_approve-'.$i,
                                        'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                        'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                        'checked' => $value->is_approve?true:false,
                                        'options'=>[
                                            'label'=>' ',
                                            'onclick'=>'rowcheck($(this))',
                                        ]
                                    ]);?>
                                  </td>
                         
                                </tr>
                                <?php endforeach;?>
                        <?php else:?>
                                <?php foreach($listmenu as $value):?>
                                   <?php $i+=1;?>
                                  <tr>
                                   <td><?=$value->name?></td>
                                   <td style="widht: 10%;text-align: center;">
                                    <input type="hidden" class="" name="menuid[]" value="<?=$value->id;?>"/> 
                                    <input type="hidden" class="input_is_full" name="is_full[]" value=""/> 
                                     <?= AwesomeCheckbox::widget([
                                          'name'=>'test',
                                          'id'=>'is_full-'.$i,
                                          'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                          'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                          'options'=>[
                                              'label'=>' ',
                                              'onclick'=>'rowallcheck($(this))',

                                          ]
                                      ]);?>
                                    </td>
                                    <td style="widht: 10%;text-align: center;">
                                      <input type="hidden" class="input_is_create" name="is_create[]" value=""/> 
                                     <?= AwesomeCheckbox::widget([
                                          'name'=>'test',
                                          'id'=>'is_create-'.$i,
                                          'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                          'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                          'options'=>[
                                              'label'=>' ',
                                              'onclick'=>'rowcheck($(this))',
                                          ]
                                      ]);?>
                                    </td>
                                    <td style="widht: 10%;text-align: center;">
                                      <input type="hidden" class="input_is_view" name="is_view[]" value=""/> 
                                     <?= AwesomeCheckbox::widget([
                                          'name'=>'test',
                                          'id'=>'is_view-'.$i,
                                          'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                          'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                          'options'=>[
                                              'label'=>' ',
                                              'onclick'=>'rowcheck($(this))',
                                          ]
                                      ]);?>
                                    </td>
                                    <td style="widht: 10%;text-align: center;">
                                      <input type="hidden" class="input_is_modified" name="is_modified[]" value=""/> 
                                     <?= AwesomeCheckbox::widget([
                                          'name'=>'test',
                                          'id'=>'is_modified-'.$i,
                                          'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                          'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                          'options'=>[
                                              'label'=>' ',
                                              'onclick'=>'rowcheck($(this))',
                                          ]
                                      ]);?>
                                    </td>
                                    <td style="widht: 10%;text-align: center;">
                                      <input type="hidden" class="input_is_delete" name="is_delete[]" value=""/> 
                                     <?= AwesomeCheckbox::widget([
                                          'name'=>'test',
                                          'id'=>'is_delete-'.$i,
                                          'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                          'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                          'options'=>[
                                              'label'=>' ',
                                              'onclick'=>'rowcheck($(this))',
                                          ]
                                      ]);?>
                                    </td>
                                    <td style="widht: 10%;text-align: center;">
                                      <input type="hidden" class="input_is_approve" name="is_approve[]" value=""/> 
                                     <?= AwesomeCheckbox::widget([
                                          'name'=>'test',
                                          'id'=>'is_approve-'.$i,
                                          'type'=>AwesomeCheckbox::TYPE_CHECKBOX,
                                          'style'=>[AwesomeCheckbox::STYLE_CIRCLE, AwesomeCheckbox::STYLE_SUCCESS],
                                          'options'=>[
                                              'label'=>' ',
                                              'onclick'=>'rowcheck($(this))',
                                          ]
                                      ]);?>
                                    </td>
                           
                                  </tr>
                                  <?php endforeach;?>
                        <?php endif;?>
                        
                       
                      </tbody>
                    </table>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>
          
    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs('
      $(function(){

      });

      function rowallcheck(e){
        var id = e.attr("id").split("-");
        if(e.is(":checked")){
          e.closest("tr").find("#is_view-"+id[1]).prop("checked","checked");
          e.closest("tr").find("#is_modified-"+id[1]).prop("checked","checked");
          e.closest("tr").find("#is_delete-"+id[1]).prop("checked","checked");
          e.closest("tr").find("#is_approve-"+id[1]).prop("checked","checked");
          e.closest("tr").find("#is_create-"+id[1]).prop("checked","checked");

          e.closest("tr").find(".input_is_full").val("1");
          e.closest("tr").find(".input_is_view").val("1");
          e.closest("tr").find(".input_is_modified").val("1");
          e.closest("tr").find(".input_is_delete").val("1");
          e.closest("tr").find(".input_is_approve").val("1");
          e.closest("tr").find(".input_is_create").val("1");

        }else{
          e.closest("tr").find("#is_view-"+id[1]).prop("checked","");
          e.closest("tr").find("#is_modified-"+id[1]).prop("checked","");
          e.closest("tr").find("#is_delete-"+id[1]).prop("checked","");
          e.closest("tr").find("#is_approve-"+id[1]).prop("checked","");
          e.closest("tr").find("#is_create-"+id[1]).prop("checked","");

          e.closest("tr").find(".input_is_full").val("0");
          e.closest("tr").find(".input_is_view").val("0");
          e.closest("tr").find(".input_is_modified").val("0");
          e.closest("tr").find(".input_is_delete").val("0");
          e.closest("tr").find(".input_is_approve").val("0");
          e.closest("tr").find(".input_is_create").val("0");
        }
      }
      function rowcheck(e){
        var id = e.attr("id").split("-");
        var cname = "input_"+id[0];
        if(e.is(":checked")){
           
           e.closest("tr").find("."+cname).val("1");
            

           if(e.closest("tr").find("#is_view-"+id[1]).is(":checked") && e.closest("tr").find("#is_modified-"+id[1]).is(":checked") && e.closest("tr").find("#is_delete-"+id[1]).is(":checked") && e.closest("tr").find("#is_approve-"+id[1]).is(":checked") && e.closest("tr").find("#is_create-"+id[1]).is(":checked")){
            e.closest("tr").find("#is_full-"+id[1]).prop("checked","checked");
            e.closest("tr").find(".input_is_full").val("1");

           }else{
           
           }
        }else{
          e.closest("tr").find("#is_full-"+id[1]).prop("checked","");
          e.closest("tr").find("."+cname).val("0");
          e.closest("tr").find(".input_is_full").val("0");
        }
      }

  ',static::POS_END)?>