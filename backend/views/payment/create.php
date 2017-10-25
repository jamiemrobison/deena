<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Payment */

$this->title = 'สร้างรายการชำระเงิน';
$this->params['breadcrumbs'][] = ['label' => 'ชำระเงิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-create">

    <?= $this->render('_form_new', [
        'model' => $model,
         'insureid'=>$insureid,
         'runno'=>$runno,
         'paymentdata' => $paymentdata,
         'installment_model'=>$installment_model,
         'insure_payment_data'=>$insure_payment_data,
         'installment'=>$installment,
         'count_period'=>$count_period,
    ]) ?>

</div>
