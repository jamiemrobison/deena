<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Introduce */

$this->title = 'สร้างค่าแนะนำ';
$this->params['breadcrumbs'][] = ['label' => 'ค่าแนะนำ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="introduce-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
