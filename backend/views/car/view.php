<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Car */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'รหัสรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-view">

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
              'attribute'=>'insure_type',
              'value'=>function($data){
                return $data->insure_type!=''?\backend\helpers\InsureCodeType::getTypeById($data->insure_type):'';
              }
            ],
            'car_code',
            'name',
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
        ],
    ]) ?>

</div>
