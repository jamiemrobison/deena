<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Package */

$this->title = 'แก้ไขแพ็กเกจ: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'แพ็กเกจ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="package-update">

  
    <?= $this->render('_form', [
        'model' => $model,
        'model_protect' => $model_protect,
        'model_condition' => $model_condition,
        'model_protect_detail' => $model_protect_detail,
        'model_condition_detail' => $model_condition_detail,
        'model_car_select' => $model_car_select,
        'model_company_com' => $model_company_com,
        'model_package'=>$model_package,
        'model_promotion'=>$model_promotion,
        'model_promotion_data'=>$model_promotion_data,
    ]) ?>

</div>
