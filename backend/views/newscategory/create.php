<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Newscategory */

$this->title = 'สร้างหมวดข่าว';
$this->params['breadcrumbs'][] = ['label' => 'หมวดข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newscategory-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
