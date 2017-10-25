<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prefixname */

$this->title = 'แก้ไขคำนำหน้า:'.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Prefixnames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prefixname-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
