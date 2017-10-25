<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Paymentchannel */

$this->title = 'แก้ไขช่องทางชำระเงิน';
$this->params['breadcrumbs'][] = ['label' => 'ช่องทางชำระเงิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paymentchannel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
