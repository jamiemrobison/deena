<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carbrand */

$this->title = 'Update Carbrand: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Carbrands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carbrand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
