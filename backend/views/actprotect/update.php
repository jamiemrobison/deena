<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Actprotect */

$this->title = 'แก้ไขความคุ้มครอง';
$this->params['breadcrumbs'][] = ['label' => 'ความคุ้มครอง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actprotect-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
