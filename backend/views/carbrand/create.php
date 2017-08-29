<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Carbrand */

$this->title = 'Create Carbrand';
$this->params['breadcrumbs'][] = ['label' => 'Carbrands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carbrand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
