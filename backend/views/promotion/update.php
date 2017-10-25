<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promotion */

$this->title = 'แก้ไขโปรโมชั่น : '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่น', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotion-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
