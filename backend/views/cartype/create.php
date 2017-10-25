<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cartype */

$this->title = 'สร้างประเภทรถ';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartype-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
