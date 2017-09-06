<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Carinfo */

$this->title = 'สร้างข้อมูลรถ';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carinfo-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
