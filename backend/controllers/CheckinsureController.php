<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Package;
use common\models\PackageCar;
use backend\models\Checkinsure;
use backend\models\Checkinsurebytype;
use kartik\mpdf\Pdf;
use backend\models\Quotation;

class CheckinsureController extends Controller
{
	public $enableCsrfValidation = false;
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['POST','GET'],
                ],
            ],
        ];
    }
	public function actionIndex(){
		$model = new Checkinsure();
	    $model2 = new Checkinsurebytype();
		$product = '';
		$brand = '';
		$carmodel = '';
		$year = '';
		$modellist = null;
		$carcode = '';
		$producttype = '';
		$searchtype = '';

		if($model->load(Yii::$app->request->post())){
			
			$product = $model->product;
			$brand = $model->brand;
			$carmodel = $model->model;
			$year = $model->year;
            
            $searchtype = 0;
			//echo $carmodel;return;


                   $sql = '';
				   $sql = "SELECT product_package.company_insure, product_package.insure_type, product_package.package_code
				    , product_package.name as package_name
					, product_package.id, package_car.car_id, car_info.model, car_info.car_year, car_info.brand
					, car_brand.name, insure_company.logo, insure_company.name AS insure_name
					, car_info.id as carinfoid,product_price.alltotal
					FROM product_package INNER JOIN package_car ON product_package.id = package_car.package_id 
					INNER JOIN car_info ON package_car.car_id = car_info.id 
					INNER JOIN car_brand ON car_info.brand = car_brand.id 
					INNER JOIN insure_company ON product_package.company_insure = insure_company.id
					LEFT JOIN product_price ON product_package.id = product_price.package_id";

                   
					$sql.=" WHERE brand =".$brand;
					$sql.=" AND product_package.insure_type =".$product;
					$sql.=" AND car_info.id =".$carmodel;
					// if($brand){
					// 	$sql.= " WHERE brand =".$brand;
					// }
					// if($product!='' && $brand!=''){
					// 	$sql.= " AND product_package.insure_type =".$product;
					// }elseif($product != ''){
					// 	$sql.= " WHERE product_package.insure_type =".$product;
					// }
					// if($brand!='' && $carmodel!=''){
					// 	$sql.= " AND car_info.id =".$carmodel;
					// }else{
					// 	$sql.= " WHERE car_info.id =".$carmodel;
					// }
					// if($brand!='' && $carmodel!='' && $year!=''){
					// 	$sql.= " AND car_year =".$year;
					// }elseif($year!=''){
					// 	$sql.= " AND car_year =".$year;
					// }  INNER JOIN car_year ON car_info.car_year = car_year.id 

					$sql.=" GROUP BY id";

			
			//echo $sql;return;
			
			$qury = Yii::$app->db->createCommand($sql);
			$modellist = $qury->queryAll();

			return $this->render('index_new',[
			'model'=>$model,
			'model2'=>$model2,
			'product'=>$brand,
		    'brand'=>$brand,
			'carmodel'=>$carmodel,
			'year'=>$year,
			'modellist'=>$modellist,
			'searchtype'=>$searchtype,
		]);
			
		}

		if($model2->load(Yii::$app->request->post())){
			//echo "ok"; return;
			$carcode = $model2->carcode;
			$producttype = $model2->producttype;
             
            // echo $producttype;return;
			//print_r($model2);return;

			$searchtype = 1;

			$sql = "SELECT product_package.company_insure, product_package.insure_type, product_package.package_code
					, product_package.name as package_name
					, product_package.id, package_car.car_id, car_info.model, car_info.car_year, car_info.brand
					, car_year.year_eng, car_brand.name, insure_company.logo, insure_company.name AS insure_name
					, car_info.id as carinfoid,product_price.alltotal
					FROM product_package INNER JOIN package_car ON product_package.id = package_car.package_id 
					INNER JOIN car_info ON package_car.car_id = car_info.id INNER JOIN car_year ON car_info.car_year = car_year.id 
					INNER JOIN car_brand ON car_info.brand = car_brand.id 
					INNER JOIN insure_company ON product_package.company_insure = insure_company.id
					LEFT JOIN product_price ON product_package.id = product_price.package_id";
					
					if($carcode !='' && $producttype != ""){
						$sql.= " WHERE product_package.car_code =".$carcode;
						$sql.= " AND product_package.insure_type =".$producttype;
					}
					if($carcode !='' && $producttype == ""){
						$sql.= " WHERE product_package.car_code =".$carcode;
					}
					if($carcode =='' && $producttype != ""){
						//$sql.= " WHERE product_package.car_code =".$carcode;
						$sql.= " WHERE product_package.insure_type =".$producttype;
					}
					

					$sql.=" GROUP BY id";

					$qury = Yii::$app->db->createCommand($sql);
					$modellist = $qury->queryAll();

					return $this->render('index_new',[
					'model'=>$model,
					'model2'=>$model2,
					'product'=>$brand,
				    'brand'=>$brand,
					'carmodel'=>$carmodel,
					'year'=>$year,
					'modellist'=>$modellist,
					'carcode'=>$carcode,
					'producttype'=>$producttype,
					'searchtype'=>$searchtype,
				]);
			
		}





		return $this->render('index_new',[
			'model'=>$model,
			'model2'=>$model2,
			'brand'=>$brand,
			'carmodel'=>$carmodel,
			'year'=>$year,
			'modellist'=>$modellist
		]);

	}
	public function actionGenquotation() {
		    $listid = Yii::$app->request->post('list');
		    if(count($listid) > 0){
		    	$list = split(",", $listid);
		    	$package = '';
		    	for($i=0;$i<=count($list)-1;$i++){
		    		if($i==0){
		    			$package = $list[$i];
		    		}else{
		    			$package = $package.','.$list[$i];
		    		}
		    	}
		    	$model = new Quotation();
		    	$model->quotation_no = Quotation::getLastNo();
		    	$model->quotation_date = strtotime(date('d-m-Y'));
		    	$model->package_id = $package ;
		    	if($model->save(false)){
		    		for($i=0;$i<=count($list)-1;$i++){
		    			$modelline = new \backend\models\Quotationdetail();
			    		$modelline->quatation_id = $model->id;
			    		$modelline->package_id = $list[$i];
			    		$modelline->amount = $this->getPackageprice($list[$i]);
			    		$modelline->act_amount = $this->getActprice($list[$i]);
			    		$modelline->total_amount = 0;
			    		$modelline->status = 0;
			    		$modelline->save(false);

		    		}
		    	}
		    		
		    		return $this->redirect(['quotation/update','id'=>$model->id]);
		    	}
		    
		    
	}
	public function getPackageprice($id){
		if($id){
			$model = \backend\models\Productprice::find()->where(['package_id'=>$id])->one();
			return count($model)>0?$model->alltotal:0;
		}
	}
	public function getActprice($id){
		$act_amount = 0;
		if($id){
			$model = \backend\models\Package::find()->where(['id'=>$id])->one();
			if($model){
				$modelact = \backend\models\Act::find()->where(['id'=>$model->car_code])->one();
				$act_amount = count($modelact)>0?$modelact->tax_premium:0;
			}
			return $act_amount;
		}else{
			return $act_amount;
		}
	}
	public function actionQuotation() {
		    $listid = Yii::$app->request->post('list');
            
            $sql = "SELECT actprotect_name,actprotect_id,coverage_type FROM v_packages where package_id in (".$listid.") GROUP BY actprotect_name ORDER BY v_packages.company_insure ASC";
            $qury = Yii::$app->db->createCommand($sql);
			$modellist = $qury->queryAll();

			$sql = "SELECT insure_company.short_name from product_package INNER JOIN insure_company ON product_package.company_insure = insure_company.id WHERE product_package.id in (".$listid.") ORDER BY insure_company.id ASC";
			$qury = Yii::$app->db->createCommand($sql);
			$comlist = $qury->queryAll();

			$sql = "SELECT service_type from product_package WHERE product_package.id in (".$listid.")";
			$qury = Yii::$app->db->createCommand($sql);
			$servicelist = $qury->queryAll();

			$sql = "SELECT product.product_code from product_package INNER JOIN product ON product_package.insure_type = product.id WHERE product_package.id in (".$listid.")";
			$qury = Yii::$app->db->createCommand($sql);
			$insuretypelist = $qury->queryAll();

			$sql = "SELECT product_package.id,product_price.alltotal from product_package INNER JOIN product_price ON product_package.id = product_price.package_id WHERE product_package.id in (".$listid.")";
			$qury = Yii::$app->db->createCommand($sql);
			$pricelist = $qury->queryAll();
 			
 			$sql = "SELECT amount,actprotect_id,coverage_type FROM v_packages where package_id in (".$listid.") ORDER BY v_packages.company_insure ASC ";
            $qury = Yii::$app->db->createCommand($sql);
			$amountlist1 = $qury->queryAll();

            //echo count($amountlist1);return;
		    $pdf = new Pdf([
		        'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
		        'format' => Pdf::FORMAT_A4, 
		        'orientation' => Pdf::ORIENT_PORTRAIT,
		        'destination' => Pdf::DEST_BROWSER, 
		        'content' => $this->renderPartial('_quotation',[
		        	'listid'=>$modellist,
		        	'companylist'=>$comlist,
		        	'servicelist'=>$servicelist,
		        	'insuretypelist'=>$insuretypelist,
		        	'amountlist1'=>$amountlist1,
		        	'pricelist'=>$pricelist,
		        	]),
		        //'content' => "nira",
		        'cssFile' => '@backend/web/css/pdf.css',
		        'options' => [
		            'title' => 'Privacy Policy - Krajee.com',
		            'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
		        ],
		        'methods' => [
		           // 'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
		           // 'SetFooter' => ['|Page {PAGENO}|'],
		        ]
		    ]);
   			 return $pdf->render();
	}
}