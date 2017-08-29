<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */

$this->title = 'แก้ไขกลุ่มผู้ใช้: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-group-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
