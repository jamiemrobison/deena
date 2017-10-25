<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Act */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'อัตราค่าเบี้ย พรบ.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-view">

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
            'car_code',
            'car_type_id',
            'car_description',
            'tax_premium',
            'tax',
            'duty',
            'all_premium',
            'protect_amount',
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
