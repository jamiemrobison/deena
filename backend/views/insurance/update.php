<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Insurance */

$this->title = 'แก้ไขรายการแจ้งประกันใหม่ : '.$model->insure_code;
$this->params['breadcrumbs'][] = ['label' => 'แจ้งประกันใหม่', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->insure_code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insurance-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelfile'=>$modelfile,
         'paymentdata'=>$paymentdata,
           'modelfile'=>$modelfile,
                'model_filedata'=> $model_filedata,
                'installment_model'=>$installment_model,
                'installment_data'=>$installment_data,
    ]) ?>

</div>
