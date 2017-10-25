<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Act */

$this->title = 'แก้ไขข้อมูล พรบ.'.$model->car_code;
$this->params['breadcrumbs'][] = ['label' => 'อัตราค่าเบี้ย พรบ.', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="act-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
