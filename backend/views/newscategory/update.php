<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Newscategory */

$this->title = 'แก้ไขหมวดข่าว';
$this->params['breadcrumbs'][] = ['label' => 'หมวดข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newscategory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
