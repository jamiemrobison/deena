<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productprice */

$this->title = 'แก้ไขราคาผลิตภัณฑ์: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'ราคาผลิตภัณฑ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productprice-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
