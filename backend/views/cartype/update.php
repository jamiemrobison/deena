<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cartype */

$this->title = 'แก้ไขประเภทรถ : '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cartype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
