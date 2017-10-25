<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\helpers\Prefixname;

/* @var $this yii\web\View */
/* @var $model backend\models\Member */

$this->title = $model->member_code;
$this->params['breadcrumbs'][] = ['label' => 'สมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">


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
            'member_code',
            'intro_code',
            'line_code',
            'level_id',
            'applied_date',
            'expired_date',
            //'title_name',
            [
                'attribute'=>'title_name',
                'value'=> function($data){
                    return $data->title_name!=''?Prefixname::getTypeById($data->title_name):'';
                }
            ],
            'first_name',
            'last_name',
            'card_id',
            'dob',
            'address',
            'mobile',
            'phone',
            'email:email',
            'line',
            'career',
            'card_into',
            'card_into_expired',
            'bank_account',
            'income_expect',
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
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>

</div>
