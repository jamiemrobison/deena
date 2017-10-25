<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Insurancecompany */

$this->title = 'แก้ไขบริษัทประกัน: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'บริษัทประกัน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insurancecompany-update">


    <?= $this->render('_form', [
        'model' => $model,
        'model_bankaccount' => $model_bankaccount,
        'model_bankdata' => $model_bankdata,
        'model_commission' => $model_commission,
        'model_commissiondata' => $model_commissiondata,
        'model_contactdata' => $model_contactdata,
        'model_contact' => $model_contact,
        'model_company_com' => $model_company_com,
         'modelfile'=>$modelfile,
        'model_filedata'=> $model_filedata,
        'model_cargroup'=>$model_cargroup,
        'model_cargroup_detail'=>$model_cargroup_detail,
    ]) ?>

</div>
