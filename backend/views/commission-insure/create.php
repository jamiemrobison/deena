<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CommissionInsure */

$this->title = 'Create Commission Insure';
$this->params['breadcrumbs'][] = ['label' => 'Commission Insures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commission-insure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
