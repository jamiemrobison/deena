<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carinfo */

$this->title = 'Update Carinfo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Carinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
