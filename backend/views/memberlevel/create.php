<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Memberlevel */

$this->title = 'สร้างระดับสมาชิก';
$this->params['breadcrumbs'][] = ['label' => 'ระดับสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberlevel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
