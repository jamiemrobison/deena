<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use toxor88\switchery\Switchery;
/* @var $this yii\web\View */
/* @var $model backend\models\Promotiontype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotiontype-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">

                  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

                  <?php echo $form->field($model, 'icon')->hiddenInput(['id'=>'icon','value'=>$model->isNewRecord?"":$model->icon]) ?>

                  <?php if($model->isNewRecord):?>
                          <h1><i id="show-i" class=""></i></h1>
                  <?php else:?>
                           <h1><i id="show-i" class="<?=$model->icon?>"></i></h1>
                  <?php endif;?>
                  
                  <?php echo $form->field($model, 'status')->widget(Switchery::className(),['options'=>['label'=>'']]) ?>

                  <div class="form-group">
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="row">
                    <div class="col-lg-12">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <p> 
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                     xx
                    </button>
                  </p> -->
                  <div class="collapsex" id="collapseExample">
                    <div class="card card-block">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                           เลือก icon ที่ต้องการ
                        </div>
                         <div class="panel-body">
                        <ul class="icon-type">
                          <li id="fa fa-truck" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-truck"></i></h2></a>
                          <li id="fa fa-truck" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-bicycle"></i></h2></a>
                          <li id="fa fa-car" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-car"></i></h2></a>
                          <li id="fa fa-book" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-book"></i></h2></a>
                          <li id="fa fa-bolt" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-bolt"></i></h2></a>
                          <li id="fa fa-bullhorn" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa  fa-bullhorn"></i></h2></a>
                          <li id="fa fa-fa-external-link" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-external-link"></i></h2></a>
                          <li id="fa fa-cc-mastercard" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-cc-mastercard"></i></h2></a>
                          <li id="fa fa-gift" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-gift"></i></h2></a>
                          <li id="fa fa-fw fa-cart-arrow-down" style="float:left;padding: 10Px 15px 10px 15px"><a style="display: block;text-align: center;padding: 10px 10px 10px 10px"><h2><i class="fa fa-fw fa-cart-arrow-down"></i></h2></a>
                          </li>
                        </ul>
                        
                      </div>
                      </div>
                     
                    </div>
                  </div>
                    </div>
                  </div>
                   
                </div>
                </div>
                </div>
              </div>
            </div>
          </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerCss('
    ul{
      list-style-type: none;
    }
    ul li:hover {
      background: #ccc;
    }
  ')?>
<?php $this->registerJs('
    $(function(){
      $("ul.icon-type li").click(function(){
          var icon = $(this).attr("id");
          $("#show-i").removeClass();
          $("#show-i").addClass(icon);
          $("#icon").val(icon);

      });
    });
  ')?>