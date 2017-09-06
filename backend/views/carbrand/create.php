<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Carbrand */

$this->title = 'สร้างยี่ห้อรถ';
$this->params['breadcrumbs'][] = ['label' => 'ยี่ห้อรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carbrand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
