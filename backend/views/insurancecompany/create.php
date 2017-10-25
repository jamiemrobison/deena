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
        'model_bankaccount' => $model_bankaccount,
        'model_commission' => $model_commission,
        'model_contact' => $model_contact,
        'model_company_com' => $model_company_com,
        'modelfile'=>$modelfile,
        'model_cargroup' => $model_cargroup,
        //'model_cargroup_detail' => $model_cargroup_detail,
    ]) ?>

</div>
