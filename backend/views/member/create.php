<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Member */

$this->title = 'สร้างสมาชิก';
$this->params['breadcrumbs'][] = ['label' => 'สมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-create">

    <?= $this->render('_form', [
        'model' => $model,
        'runno' => $runno,
         'model_bankaccount' => $model_bankaccount,
          'modelfile'=>$modelfile,
    ]) ?>

</div>
