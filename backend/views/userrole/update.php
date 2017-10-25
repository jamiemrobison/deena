<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */

$this->title = 'Update Userrole:'.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Userroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userrole-update">
    <?= $this->render('_form', [
        'model' => $model,
        'listmenu' => $listmenu,
       'listmenu_select'=>$listmenu_select,
    ]) ?>

</div>
