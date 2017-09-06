<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Shop */

//$this->title = 'ข้อมูลร้าน: {nameAttribute}';
$this->title = '';
// $this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="shop-update">

    <?= $this->render('_form', [
        'model' => $model,
        'model_bankdata' => $model_bankdata,
        'model_bankaccount' => $model_bankaccount,
    ]) ?>

</div>
