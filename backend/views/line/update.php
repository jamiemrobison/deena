<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Line */

$this->title = 'แก้ไขรหัสสายงาน: '.$model->line_code;
$this->params['breadcrumbs'][] = ['label' => 'สายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="line-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
