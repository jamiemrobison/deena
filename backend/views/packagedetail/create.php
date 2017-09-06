<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Packagedetail */

$this->title = 'Create Packagedetail';
$this->params['breadcrumbs'][] = ['label' => 'Packagedetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packagedetail-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
