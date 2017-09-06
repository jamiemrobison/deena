<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carinfo */

$this->title = 'แก้ไขข้อมูลรถ: '.$model->findBrand($model->brand).'/'.$model->model;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->findBrand($model->brand).'/'.$model->model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carinfo-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
