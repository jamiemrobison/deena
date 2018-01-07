<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DashboardController extends Controller
{
	public function actionIndex(){
		// $x = date('d-m-Y',1511709729);
		// echo $x;
		return $this->render('index');
	}
}