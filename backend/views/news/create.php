<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title ='สร้างข่าวสาร';
$this->params['breadcrumbs'][] = ['label' => 'ข่าวสาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
