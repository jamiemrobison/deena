<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Promotion */

$this->title = 'สร้างโปรโมชั่น';
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่น', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
