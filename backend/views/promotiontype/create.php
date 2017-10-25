<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Promotiontype */

$this->title = 'สร้างประเภทโปรโมชั่น';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทโปรโมชั่น', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotiontype-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
