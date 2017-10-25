<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">
  
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
            //'id',
            'title',
            'category_id',
           // 'description',
            [
               'attribute'=>'start_date',
               'value'=>function($data){
                 return $data->start_date!=''?date('d-m-Y',$data->start_date):'';
               }
             ],
            [
               'attribute'=>'end_date',
               'value'=>function($data){
                 return $data->end_date!=''?date('d-m-Y',$data->end_date):'';
               }
             ],
           // 'photo',
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
