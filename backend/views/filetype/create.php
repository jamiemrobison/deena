<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Filetype */

$this->title = 'สร้างประเภทไฟล์';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทไฟล์แนบ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filetype-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
