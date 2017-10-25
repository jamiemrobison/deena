<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */

$this->title = 'แก้ไขรายการชำระเงิน:'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'ชำระเงิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
