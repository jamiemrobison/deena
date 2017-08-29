<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Insurancecompany */

$this->title = 'แก้ไขบริษัทประกัน: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'บริษัทประกัน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insurancecompany-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
