<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotation */

$this->title = 'แก้ไขใบเสนอราคา : '.$model->quotation_no;
$this->params['breadcrumbs'][] = ['label' => 'ใบเสนอราคา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quotation_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotation-update">
    <?= $this->render('_form', [
        'model' => $model,
        'listid'=>$listid,
		'companylist'=>$companylist,
		'servicelist'=>$servicelist,
		'insuretypelist'=>$insuretypelist,
		 'amountlist1'=>$amountlist1,
		 'pricelist'=>$pricelist,
		 'actprice'=>$actprice,
		 'insurecost'=>$insurecost,
    ]) ?>

</div>
