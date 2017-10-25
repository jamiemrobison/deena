<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promotiontype */

$this->title = 'แก้ไขประเภทโปรโมชั่น :'.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Promotiontypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotiontype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
