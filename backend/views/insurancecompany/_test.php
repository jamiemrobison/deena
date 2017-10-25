 <div class="customer-form">

                          <?php // $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
                          <div class="row">
                              <div class="col-sm-6">
                                  <?= $form->field($model_cargroup, 'name')->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-sm-6">
                                  <?= $form->field($model_cargroup, 'description')->textInput(['maxlength' => true]) ?>
                              </div>
                          </div>

                          <?php DynamicFormWidget::begin([
                              'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                              'widgetBody' => '.container-items', // required: css class selector
                              'widgetItem' => '.item', // required: css class
                              'limit' => 999, // the maximum times, an element can be added (default 999)
                              'min' => 0, // 0 or 1 (default 1)
                              'insertButton' => '.add-item', // css class
                              'deleteButton' => '.remove-item', // css class
                              'model' => $model_cargroup_detail[0],
                              'formId' => 'dynamic-form',
                              'formFields' => [
                                  'brand',
                                  'model',
                                  'description',
                              ],
                          ]); ?>

                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4>
                                      <i class="glyphicon glyphicon-envelope"></i> รายการรถยนต์
                                      <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                  </h4>
                              </div>
                              <div class="panel-body">
                                  <div class="container-items"><!-- widgetBody -->
                                  <?php foreach ($model_cargroup_detail as $i => $modelCardetail): ?>
                                      <div class="item panel"><!-- widgetItem -->
                                         <!--  <div class="panel-heading">
                                              <h3 class="panel-title pull-left">รายการรถ</h3>
                                              <div class="pull-right">
                                                  
                                              </div>
                                              <div class="clearfix"></div>
                                          </div> -->
                                         <!--  <div class="panel-body"> -->
                                              <?php
                                                  // necessary for update action.
                                                  if (! $modelCardetail->isNewRecord) {
                                                      echo Html::activeHiddenInput($modelCardetail, "[{$i}]id");
                                                  }
                                              ?>
                                              <div class="row">
                                                  <div class="col-sm-5">
                                                      <?= $form->field($modelCardetail, "[{$i}]brand")->widget(Select2::className(),[
                                                        'data'=>ArrayHelper::map(\backend\models\Carbrand::find()->all(),'id','name'),
                                                        'options'=>[
                                                          'placeholder'=>'เลือกยี่ห้อรถ','multiple' => true],
                                                        'pluginOptions' => [
                                                            'tags' => true,
                                                            'tokenSeparators' => [',', ' '],
                                                            'maximumInputLength' => 10
    ],
                                                      ])->label(false) ?>
                                                  </div>
                                                  <div class="col-sm-6">
                                                      <?= $form->field($modelCardetail, "[{$i}]model")->textInput(['maxlength' => true])->label(false) ?>
                                                  </div>
                                                  <div class="col-sm-1">
                                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                  </div>
                                              </div><!-- .row -->
                                             
                                         <!--  </div> -->
                                      </div>
                                  <?php endforeach; ?>
                                  </div>
                              </div>
                          </div><!-- .panel -->
                          <?php DynamicFormWidget::end(); ?>

                          <div class="form-group">
                              <?= Html::submitButton($modelCardetail->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
                          </div>

                          <?php //ActiveForm::end(); ?>

                      </div>