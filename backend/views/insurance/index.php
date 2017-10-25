<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\InsuranceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งทำประกันใหม่';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
           <div>
        <?= Html::a('<i class="fa fa-plus-circle"></i> แจ้งทำประกันใหม่', ['create'], ['class' => 'btn btn-success']) ?>
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

           // 'id',
            'inform_code',
            'insure_code',
            //'insure_company_id',
            [
                'attribute'=>'insure_company_id',
                'value' => function($data){
                    return $data->insure_company_id!=''?$data->getInsurecompany($data->insure_company_id):'';
                }
            ],
          //  'insure_type_id',
              [
                'attribute'=>'insure_type_id',
                'value' => function($data){
                    return $data->insure_type_id!=''?$data->getInsuretype($data->insure_type_id):'';
                }
            ],
              [
                'attribute'=>'product_id',
                'value' => function($data){
                    return $data->product_id!=''?$data->getProduct($data->product_id):'';
                }
            ],
            // 'product_id',
            // 'insure_no',
            // 'id_card',
            // 'prefix',
            // 'customer',
            // 'address',
            // 'district',
            // 'city',
            // 'province',
            // 'zipcode',
            // 'phone',
            // 'mobile',
            // 'email:email',
            // 'car_code',
            // 'car_brand',
            // 'car_model',
            'plate_category',
            'plate_license',
            // 'plate_province',
            // 'body_no',
            // 'machine_no',
            // 'car_additional',
            // 'body_model',
            // 'car_year',
            // 'car_usage',
            // 'protect_start_date',
            // 'protect_end_date',
            // 'additional_protect',
            // 'insure_capital',
            // 'include_dis',
            // 'total',
            // 'grand_total',
            // 'receive_date',
            // 'member_id',
            // 'insure_driver',
            // 'driver_one',
            // 'driver_two',
            // 'driver_date_one',
            // 'driver_date_two',
            // 'insure_renew_date',
            // 'beneficiary',
            // 'remark',
            [
               'attribute'=>'status',
               'format' => 'html',
               'value'=>function($data){
                if($data->status === 1){
                    return '<div class="label label-default">รอชำระเงิน</div>';
                }else  if($data->status === 2){
                    return '<div class="label label-success">ชำระเงินแล้ว</div>';
                }
                 
               }
             ],

            [
                        'label' => 'Action',
                        'format' => 'raw',
                        'value' => function($model){
                                return '
                                    <div class="btn-group" >
                                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu" style="right: 0; left: auto;">
                                        <li><a href="'.Url::toRoute(['/insurance/view', 'id'=>$model->id]).'">'.'View'.'</a></li>
                                        <li><a href="'.Url::toRoute(['/insurance/update', 'id'=>$model->id]).'">'.'Update'.'</a></li>
                                        <li><a onclick="return confirm(\'Confirm ?\')" href="'.Url::to(['/insurance/delete', 'id'=>$model->id],true).'">Delete</a></li>
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
