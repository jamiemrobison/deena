<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Package */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-view">


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
            'company_insure',
            'insure_type',
            'name',
            'start_date',
            'end_date',
            'service_type',
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
