<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Docuref */

$this->title = 'Create Docuref';
$this->params['breadcrumbs'][] = ['label' => 'Docurefs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docuref-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
