<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Subcategory */

$this->title = 'สร้างหมวดย่อย';
$this->params['breadcrumbs'][] = ['label' => 'หมวดย่อย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategory-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
