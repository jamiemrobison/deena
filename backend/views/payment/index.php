<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ชำระเงิน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
           <div>
        <?= Html::a('<i class="fa fa-plus-circle"></i> สร้างรายการชำระเงิน', ['create'], ['class' => 'btn btn-success']) ?>
         <div class="btn-group pull-right" style="bottom: 10px">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
      </div>
      </div>
      <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'insure_no',
            [
              'attribute'=>'insure_no',
              'value'=>function($data){
                return \backend\models\Insurance::getInsureno($data->insure_no);
              }
            ],
             [
              'attribute'=>'payment_code',
              'value'=>function($data){
                return $data->payment_code;
              }
            ],
               [
              'attribute'=>'payment_date',
              'value'=>function($data){
                return date('d-m-Y',$data->payment_date);
              }
            ],
            'payment_time',
            'period_no',
            'amount',
           [
              'attribute'=>'bank_id',
              'value'=>function($data){
                return \backend\models\Bank::getBankshortname($data->bank_id);
              }
            ],
             [
              'attribute'=>'bank_account',
              'value'=>function($data){
                return \backend\models\Bankaccount::getInfo($data->bank_account);
              }
            ],
             [
              'attribute'=>'payment_method',
              'value'=>function($data){
                return \backend\models\Paymentchannel::getPaymentName($data->payment_method);
              }
            ],
            // 'remark',
            // 'insure_no',
            // [
            //    'attribute'=>'status',
            //    'format' => 'html',
            //    'value'=>function($data){
            //      return $data->status === 1 ? '<div class="label label-success">Active</div>':'<div class="label label-default">Inactive</div>';
            //    }
            //  ],

            [
                        'label' => 'Action',
                        'format' => 'raw',
                        'value' => function($model){
                                return '
                                    <div class="btn-group" >
                                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu" style="right: 0; left: auto;">
                                        <li><a href="'.Url::toRoute(['/payment/view', 'id'=>$model->id]).'">'.'View'.'</a></li>
                                        <li><a href="'.Url::toRoute(['/payment/update', 'id'=>$model->id]).'">'.'Update'.'</a></li>
                                        <li><a onclick="return confirm(\'Confirm ?\')" href="'.Url::to(['/payment/delete', 'id'=>$model->id],true).'">Delete</a></li>
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
