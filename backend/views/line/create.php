<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Line */

$this->title = 'สร้างสายงาน';
$this->params['breadcrumbs'][] = ['label' => 'สายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="line-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
