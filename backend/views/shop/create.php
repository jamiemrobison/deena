<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Shop */

$this->title = '';
//$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-create">

    <br />
    <?= $this->render('_form', [
        'model' => $model,
        'model_bankaccount' => $model_bankaccount,
    ]) ?>

</div>
