<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แพ็กเกจผลิตภัณฑ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
           <div>
        <?= Html::a('<i class="fa fa-plus-circle"></i> สร้างแพ็กเกจ', ['create'], ['class' => 'btn btn-success']) ?>
         <div class="btn-group pull-right" style="bottom: 10px">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
      </div>
      </div>
      <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'company_insure',
                'value'=> function($data){
                    return $data->company_insure!=''?$data->companyinfo->name:'';
                }
            ],
            [
                'attribute'=>'insure_type',
                'value'=> function($data){
                    return $data->insure_type!=''?$data->productinfo->product_code:'';
                }
            ],
            'name',
            [
                'attribute'=>'start_date',
                'value'=> function($data){
                    return $data->start_date!=''?date('d-m-Y',$data->start_date):'';
                }
            ],
            [
                'attribute'=>'end_date',
                'value'=> function($data){
                    return $data->end_date!=''?date('d-m-Y',$data->end_date):'';
                }
            ],
            [
                'attribute'=>'service_type',
                'value'=> function($data){
                    return $data->service_type!=''?\backend\helpers\Servicetype::getTypeById($data->service_type):'';
                }
            ],
            [
               'attribute'=>'status',
               'format' => 'html',
               'value'=>function($data){
                 return $data->status === 1 ? '<div class="label label-success">Active</div>':'<div class="label label-default">Inactive</div>';
               }
             ],
            //'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            [
                        'label' => 'Action',
                        'format' => 'raw',
                        'value' => function($model){
                                return '
                                    <div class="btn-group" >
                                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu" style="right: 0; left: auto;">
                                        <li><a href="'.Url::toRoute(['/package/view', 'id'=>$model->id]).'">'.'View'.'</a></li>
                                        <li><a href="'.Url::toRoute(['/package/update', 'id'=>$model->id]).'">'.'Update'.'</a></li>
                                       
                                        <li><a onclick="return recDelete($(this));" href="javascript:void(0)" data-url="'.Url::to(['/package/delete', 'id'=>$model->id],true).'">Delete</a></li>
                                        </ul>
                                    </div>
                                ';
                            // }
                        },
                        'headerOptions'=>['class'=>'text-center'],
                        'contentOptions' => ['class'=>'text-center','style'=>'vertical-align: middle','text-align: center'],

                    ],
        ],
    ]); ?>
    </div>
  </div>
  </div>
  </div>
    <?php Pjax::end(); ?>
</div>
<?php $this->registerJs('
    function recDelete(e){
        //e.preventDefault();
        var url = e.attr("data-url");
        //alert(url);
        swal({
              title: "ต้องการลบรายการนี้ใช่หรือไม่",
              text: "",
              type: "warning",
              showCancelButton: true,
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            }, function () {
              e.attr("href",url); 
              e.toggle("click");        
        });
    }
',static::POS_END);?>