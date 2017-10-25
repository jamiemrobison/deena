<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Member */

$this->title = 'แก้ไขสมาชิก: '.$model->member_code;
$this->params['breadcrumbs'][] = ['label' => 'สมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-update">

    <?= $this->render('_form', [
        'model' => $model,
        'model_bankaccount' => $model_bankaccount,
        'model_bankdata' => $model_bankdata,
         'modelfile'=>$modelfile,
         'model_filedata'=> $model_filedata,
    ]) ?>

</div>
