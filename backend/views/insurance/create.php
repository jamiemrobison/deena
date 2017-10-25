<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Insurance */

$this->title = 'แจ้งทำประกันใหม่';
$this->params['breadcrumbs'][] = ['label' => 'แจ้งประกันใหม่', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-create">

    <?= $this->render('_form', [
        'model' => $model,
        'runno' => $runno,
        'modelfile'=>$modelfile,
        'installment_model'=>$installment_model,
    ]) ?>

</div>
