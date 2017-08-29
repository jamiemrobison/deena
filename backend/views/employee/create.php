<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'สร้างข้อมูลพนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'พนักงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
