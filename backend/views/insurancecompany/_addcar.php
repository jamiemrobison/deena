<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use backend\models\Carbrand;
use backend\models\Model;
$brand = Carbrand::find()->where(['status'=>1])->all();
$carmodel = Model::find()->where(['status'=>1])->all();
?>

	<tr class="row-car-id-">
		<td>
		 <?=Select2::widget([
			    'name' => 'brand',
			    'data' => ArrayHelper::map($brand,'id','name'),
			    'size' => Select2::SMALL,
			    'options' => ['placeholder' => 'Select a state ...', 'multiple' => true],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			])
		 ?>
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr class="row-car-id-">
		<td>
		 <?=Select2::widget([
			    'name' => 'car_model',
			    'data' => ArrayHelper::map($carmodel,'id','name'),
			    'size' => Select2::SMALL,
			    'options' => ['placeholder' => 'Select a state ...', 'multiple' => true],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			])
		 ?>
		</td>
		<td></td>
		<td></td>
	</tr>
