<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Package */

$this->title = 'สร้างแพ็กเกจ';
$this->params['breadcrumbs'][] = ['label' => 'แพ็กเกจ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-create">
    <?= $this->render('_form', [
        'model' => $model,
        'model_protect' => $model_protect,
        'model_condition' => $model_condition,
    ]) ?>

</div>
