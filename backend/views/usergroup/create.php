<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */

$this->title = 'สร้างกลุ่มผู้ใช้';
$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
