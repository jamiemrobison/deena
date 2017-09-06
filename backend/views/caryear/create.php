<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Caryear */

$this->title = 'สร้างปีรถ';
$this->params['breadcrumbs'][] = ['label' => 'ปีรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caryear-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
