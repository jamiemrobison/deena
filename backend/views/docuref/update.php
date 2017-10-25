<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Docuref */

$this->title = 'Update Docuref:'.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Docurefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docuref-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
