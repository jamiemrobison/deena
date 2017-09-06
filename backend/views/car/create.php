<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Car */

$this->title = 'สร้างรหัสรถ';
$this->params['breadcrumbs'][] = ['label' => 'รหัสรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
