<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Act */

$this->title = 'สร้างอัตราค่าเบี้ยประกัน พรบ.';
$this->params['breadcrumbs'][] = ['label' => 'อัตราค่าประกัน พรบ.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
