<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Carinfo */

$this->title = 'Create Carinfo';
$this->params['breadcrumbs'][] = ['label' => 'Carinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
