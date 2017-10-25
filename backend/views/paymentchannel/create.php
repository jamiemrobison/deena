<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Paymentchannel */

$this->title = 'สร้างช่องทางชำระเงิน';
$this->params['breadcrumbs'][] = ['label' => 'ช่องทางชำระเงิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentchannel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
