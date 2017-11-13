<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductpriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ราคาผลิตภัณฑ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productprice-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
           <div>
            <?= Html::a('<i class="fa fa-plus-circle"></i> สร้างราคาผลิตภัณฑ์', ['create'], ['class' => 'btn btn-success']) ?>
            <div class="btn-group pull-right" style="bottom: 10px">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
      </div>
      </div>
      <div class="panel-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'product_id',
            //'package_id',
            [
                'attribute'=>'package_id',
                'value'=>function($data){
                    return $data->package_id!=''?\backend\models\Productprice::getPackageCode($data->package_id):'';
                }
            ],
            'car_start_year',
            'car_end_year',
            [
                'attribute'=>'amount_start',
                'value'=>function($data){
                    return $data->package_id!=''?number_format($data->amount_start,0):'0';
                }
            ],
             [
                'attribute'=>'amount_end',
                'value'=>function($data){
                    return $data->amount_end!=''?number_format($data->amount_end,0):'0';
                }
            ],
              [
                'attribute'=>'total',
                'value'=>function($data){
                    return $data->total!=''?number_format($data->total,2):'0';
                }
            ],
             [
                'attribute'=>'alltotal',
                'value'=>function($data){
                    return $data->alltotal!=''?number_format($data->alltotal,2):'0';
                }
            ],
             [
                'attribute'=>'score',
                'value'=>function($data){
                    return $data->score!=''?number_format($data->score,2):'0';
                }
            ],
            [
               'attribute'=>'is_discount',
               'contentOptions'=>['style'=>'text-align: left;'],
               'format' => 'html',
               'value'=>function($data){
                 return $data->is_discount === 1 ? '<div class="label label-success">Yes</div>':'<div class="label label-default">No</div>';
               }
             ],
            [
               'attribute'=>'is_introduce',
               'format' => 'html',
               'value'=>function($data){
                 return $data->is_introduce === 1 ? '<div class="label label-success">Yes</div>':'<div class="label label-default">No</div>';
               }
             ],
            [
               'attribute'=>'is_line',
               'format' => 'html',
               'value'=>function($data){
                 return $data->is_line === 1 ? '<div class="label label-success">Yes</div>':'<div class="label label-default">No</div>';
               }
             ],
            // 'description',
             // [
             //   'attribute'=>'status',
             //   'format' => 'html',
             //   'value'=>function($data){
             //     return $data->status === 1 ? '<div class="label label-success">Active</div>':'<div class="label label-default">Inactive</div>';
             //   }
             // ],
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
                                        <li><a href="'.Url::toRoute(['/productprice/view', 'id'=>$model->id]).'">'.'View'.'</a></li>
                                        <li><a href="'.Url::toRoute(['/productprice/update', 'id'=>$model->id]).'">'.'Update'.'</a></li>
                                        <li><a onclick="return confirm(\'Confirm ?\')" href="'.Url::to(['/productprice/delete', 'id'=>$model->id],true).'">Delete</a></li>
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
