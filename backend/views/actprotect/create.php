<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Actprotect */

$this->title = 'ส้างรายการความคุ้มครอง';
$this->params['breadcrumbs'][] = ['label' => 'ความคุ้มครอง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actprotect-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
