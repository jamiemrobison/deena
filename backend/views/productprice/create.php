<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Productprice */

$this->title = 'สร้างราคาผลิตภัณฑ์';
$this->params['breadcrumbs'][] = ['label' => 'ราคาผลิตภัณฑ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productprice-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
