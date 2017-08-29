<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */

$this->title = 'สร้างสิทธิ์การใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'สิทธิ์การใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
