<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Productprice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productprice-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'product_id',
            [
                'attribute'=>'package_id',
                'value' => function($data){
                    return $data->package_id!=''?$data->packageinfo->package_code:'';
                }
            ],
            'car_start_year',
            'car_end_year',
            'amount_start',
            'amount_end',
            'total',
            'alltotal',
            'is_discount',
            'is_introduce',
            'is_line',
            'description',
           [
               'attribute'=>'status',
               'format' => 'html',
               'value'=>function($data){
                 return $data->status === 1 ? '<div class="label label-success">Active</div>':'<div class="label label-default">Inactive</div>';
               }
             ],
            [
               'attribute'=>'created_at',
               'value'=>function($data){
                 return date('d-m-Y',$data->created_at);
               }
             ],
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>

</div>
