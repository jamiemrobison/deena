<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Caryear */

$this->title = 'แก้ไขปีรถ: '.$model->year_text;
$this->params['breadcrumbs'][] = ['label' => 'ปีรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->year_text, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caryear-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
