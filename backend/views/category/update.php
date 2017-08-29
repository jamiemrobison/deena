<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'แก้ไขหมวดผลิตภัณฑ์: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'หมวดผลิตภัณฑ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
