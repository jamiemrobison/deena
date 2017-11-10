<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

use backend\models\Car;
use backend\models\Cartype;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัตราค่าเบี้ยประกัน พรบ.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
           <div>
        <?= Html::a('<i class="fa fa-plus-circle"></i> สร้างอัตรา พรบ.', ['create'], ['class' => 'btn btn-success']) ?>
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
             'attribute'=>'car_code',
             'value'=> function($data){
                return $data->car_code;
             }
             ],
             //  [
             // 'attribute'=>'act_code_id',
             // 'value'=> function($data){
             //    return $data->act_code_id!=''?Car::getCarActcode($data->act_code_id):'';
             // }
             // ],
            [
             'attribute'=>'car_type_id',
             'value'=> function($data){
                return $data->car_type_id!=''?Cartype::getCarTypeName($data->car_type_id):'';
             }
             ],
            'car_description',
             [
             'attribute'=>'tax_premium',
             'value'=> function($data){
                return number_format($data->tax_premium);
             }
             ],
              [
             'attribute'=>'tax',
             'value'=> function($data){
                return number_format($data->tax);
             }
             ],
              [
             'attribute'=>'duty',
             'value'=> function($data){
                return number_format($data->duty);
             }
             ],
              [
                 'attribute'=>'all_premium',
                 'value'=> function($data){
                    return number_format($data->all_premium);
                 }
             ],
              [
                 'attribute'=>'score_rate',
                 'value'=> function($data){
                    return number_format($data->score_rate);
                 }
             ],
             [
                 'attribute'=>'score',
                 'value'=> function($data){
                    return number_format($data->score);
                 }
             ],
             // [
             // 'attribute'=>'protect_amount',
             // 'value'=> function($data){
             //    return number_format($data->protect_amount);
             // }
             // ],
            // 'status',
            // 'created_at',
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
                                        <li><a href="'.Url::toRoute(['/act/view', 'id'=>$model->id]).'">'.'View'.'</a></li>
                                        <li><a href="'.Url::toRoute(['/act/update', 'id'=>$model->id]).'">'.'Update'.'</a></li>
                                        <li><a onclick="return confirm(\'Confirm ?\')" href="'.Url::to(['/act/delete', 'id'=>$model->id],true).'">Delete</a></li>
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
    <?php Pjax::end(); ?>
</div>
