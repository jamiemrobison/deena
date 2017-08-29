<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Insurancecompany */

$this->title = 'สร้างบริษัทประกัน';
$this->params['breadcrumbs'][] = ['label' => 'บริษัทประกัน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurancecompany-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
