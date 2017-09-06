<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carbrand */

$this->title = 'แก้ไขยี่ห้อรถ: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Carbrands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carbrand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
