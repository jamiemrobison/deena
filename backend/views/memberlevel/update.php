<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Memberlevel */

$this->title = 'แก้ไขระดับสมาชิก: '.$model->level;
$this->params['breadcrumbs'][] = ['label' => 'ระดับสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->level, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memberlevel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
