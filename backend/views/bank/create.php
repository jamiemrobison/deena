<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bank */

$this->title = 'สร้างรายชื่อธนาคาร';
$this->params['breadcrumbs'][] = ['label' => 'ธนาคาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
