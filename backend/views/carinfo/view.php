<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Carinfo */

$this->title = $model->findBrand($model->brand).'/'.$model->model.'/'.$model->findCaryear($model->car_year);
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carinfo-view">
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
           // 'id',
            [
               'attribute'=>'brand',
               'format' => 'html',
               'value'=>function($data){
                 return $data->brand !='' ? $data->findBrand($data->brand):'';
               }
             ],
            
            'model',
             [
               'attribute'=>'car_year',
               'format' => 'html',
               'value'=>function($data){
                 return $data->car_year !='' ? $data->findCaryear($data->car_year):'';
               }
             ],
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
