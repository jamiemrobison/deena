<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Filetype */

$this->title = 'แก้ไขประเภทไฟล์แนบ :'. $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทไฟล์แนบ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="filetype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
