<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Insurance */

$this->title = $model->insure_code;
$this->params['breadcrumbs'][] = ['label' => 'แจ้งประกันใหม่', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-view">
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
            'inform_code',
            'insure_code',
            'insure_company_id',
            'insure_type_id',
            'product_id',
            'insure_no',
            'id_card',
            'prefix',
            'customer',
            'address',
            'district',
            'city',
            'province',
            'zipcode',
            'phone',
            'mobile',
            'email:email',
            'car_code',
            'car_brand',
            'car_model',
            'plate_license',
            'plate_province',
            'body_no',
            'machine_no',
            'car_additional',
            'body_model',
            'car_year',
            'car_usage',
            'protect_start_date',
            'protect_end_date',
            'additional_protect',
            'insure_capital',
            'include_dis',
            'total',
            'grand_total',
            'receive_date',
            'member_id',
            'insure_driver',
            'driver_one',
            'driver_two',
            'driver_date_one',
            'driver_date_two',
            'insure_renew_date',
            'beneficiary',
            'remark',
            'status',
            'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>

</div>
