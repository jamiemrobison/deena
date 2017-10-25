<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prefixname */

$this->title = 'สร้างคำนำหน้า';
$this->params['breadcrumbs'][] = ['label' => 'คำนำหน้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prefixname-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
