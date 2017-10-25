<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subcategory */

$this->title = 'แก้ไขหมวดย่อย: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'หมวดย่อย', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategory-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
