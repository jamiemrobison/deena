<?php

namespace backend\controllers;

use Yii;
use backend\models\Act;
use backend\models\ActSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use yii\web\db;


/**
 * ActController implements the CRUD actions for Act model.
 */
class CapitalrangeController extends Controller
{

	public $enableCsrfValidation = false;
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }
   public function actionIndex(){
   	$model = new \common\models\CapitalYear();
  	$modelfile = new \backend\models\Modelfile();

  	$model_company = \common\models\CapitalYear::find()->all();

  
   	if($modelfile->load(Yii::$app->request->post())){
          
        $capital_year = Yii::$app->request->post('capital_year');
        $company_id = Yii::$app->request->post('company_id');
        $uploaded = UploadedFile::getInstance($modelfile, 'file');

        if($capital_year == '' || (int)$capital_year <= 0 || strlen($capital_year)<4 || strlen($capital_year)>4){
			throw new ForbiddenHttpException('กรุณาใส่ปีเป็นตัว้ลข 4 หลัก!');	
        }else{
        	\common\models\CapitalYear::deleteAll(['cap_year'=>$capital_year]);
        }
        //return;

        $model->cap_year = $capital_year;
        $model->insure_company_id = $company_id;
        $model->status = 1;
        if($model->save(false)){

        		if(!empty($uploaded)){
			   			if($uploaded->extension =='xls' || $uploaded->extension =='xlsx'){
			   				$uploaded->saveAs('../web/uploads/files/'.$uploaded);
			   				$myfile = '../web/uploads/files/'.$uploaded;
			   				$inputFileType = \PHPExcel_IOFactory::identify($myfile);
			   				$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
			   				$objPHPExcel = $objReader->load($myfile);

			   				$sheet = $objPHPExcel->getSheet(0);
			   				$highestRow = $sheet->getHighestRow();
			   				$highestColumn = $sheet->getHighestColumn();

			   				for($row=1;$row <= $highestRow; $row++){
			   					$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

			   					if($row <=3){
			   						continue;
			   					}
			   					if($rowData[0][0] == ''){
			   						continue;
			   					}

			                    	$modelx = new \common\models\CapitalCarTemp();
			                    	$modelx->brand_name = $rowData[0][0];
			                    	$modelx->model_name = $rowData[0][1];
			                    	$modelx->car_group = $rowData[0][2];
			                    	$modelx->car_code = $rowData[0][3];
			                    	$modelx->cpg = $rowData[0][4];
			                    	$modelx->description = $rowData[0][0]."/".$rowData[0][1]."/".$rowData[0][2]."/".$rowData[0][3]."/".$rowData[0][4];
			                    	$modelx->minmax = $rowData[0][5];
				                    $modelx->A1 = $rowData[0][8];
				                   	$modelx->A2 = $rowData[0][9];
				                   	$modelx->A3 = $rowData[0][10];
				                   	$modelx->A4 = $rowData[0][11];
				                   	$modelx->A5 = $rowData[0][12];
				                   	$modelx->A6 = $rowData[0][13];
				                   	$modelx->A7 = $rowData[0][14];
				                   	$modelx->A8 = $rowData[0][15];
				                   	$modelx->A9 = $rowData[0][16];
				                   	$modelx->A10 = $rowData[0][17];
				                   	$modelx->A11 = $rowData[0][18];
				                   	$modelx->A12 = $rowData[0][19];
				                   	$modelx->A13 = $rowData[0][20];
				                   	$modelx->A14 = $rowData[0][21];
				                   	$modelx->A15 = $rowData[0][22];
				                   	$modelx->A16 = $rowData[0][23];
				                   	$modelx->A17 = $rowData[0][24];
				                   	$modelx->A18 = $rowData[0][25];
				                   	$modelx->A19 = $rowData[0][26];
				                   	$modelx->A20 = $rowData[0][27];
				                   	$modelx->A21 = $rowData[0][28];
				                   	$modelx->A22 = $rowData[0][29];
				                   	$modelx->A23 = $rowData[0][30];
				                   	$modelx->A24 = $rowData[0][31];
			                       	$modelx->A25 = $rowData[0][32];
			                    	$modelx->save(false);
			                   // }
			                    
			   					//echo $rowData[0][0]."/".$rowData[0][1]."/".$rowData[0][2]."/".$rowData[0][3]."/".$rowData[0][4].'<br />';
			   				}
			   						
			   				//chown('../web/uploads/files/'.$uploaded,0777);
			   				//unlink('../web/uploads/files/'.$uploaded);

			   			
						    $this->getShow($model->id,$capital_year);
			               return $this->render('index',[
						   		'model' => $model,
						   		'modelfile' => $modelfile,
						   		'model_company'=>$model_company,
						   		]);
			   			}
			   		}
        }

   	}else{
   		return $this->render('index',[
   			'model' => $model,
			'modelfile' => $modelfile,
			
			'model_company'=>$model_company,
   		]);
   	}

   }
   public function getShow($year_id,$year){

    $names = \common\models\CapitalCarTemp::find()->select(['brand_name','model_name','description','car_group','car_code','cpg'])->distinct(['description'])->all();
			    if(count($names)>0){
			    	foreach ($names as $value) {
			    		$model = new \common\models\CapitalCar();
			    		$model->cap_year_id = $year_id;
			    		$model->brand_name = $value->brand_name;
			    		$model->model_name = $value->model_name;
			    		$model->car_group = $value->car_group;
			    		$model->car_code = $value->car_code;
			    		$model->cpg = $value->cpg;
			    		$model->description = $value->description;
			    		if($model->save(false)){

			    			$modelline = \common\models\CapitalCarTemp::find()->where(['description'=>$model->description])->orderby(['id'=>SORT_ASC])->all();
			    			if(count($modelline)>0){
			    				$i=0;
			    				foreach ($modelline as $value) {
			    					$i+=1;
			    					for($x=1;$x<=24;$x++){
			    						    $amt = 0;
			    						    $column = "A".$x;
						    				$amt = $this->getBycolumn($column,$value->id);

						    				$next_year = (int)$year - (int)$x;
                                            $year_text = $next_year.'/'.((int)$next_year + 543);
					    					if($i==1){
					    						$modeldetail = new \common\models\CapitalMax();
						    					$modeldetail->capital_car_id = $model->id;					    					
					    						$modeldetail->max = $amt;
					    						$modeldetail->year_count = $x+1;
					    						$modeldetail->year_text = $year_text;
					    						$modeldetail->save(false);
					    					}else{
					    						$modeldetail = new \common\models\CapitalMin();
						    					$modeldetail->capital_car_id = $model->id;					    					
					    						$modeldetail->min = $amt;
					    						$modeldetail->year_count = $x+1;
					    						$modeldetail->year_text = $year_text;
					    						$modeldetail->save(false);
					    					}
					    					
					    					
			    					} 
			    				}
			    				
			    			}

			    		}
			    	}
			    	return true;
			    }
   }
   public function getBycolumn($column,$cap_car_id){
   		$model = \common\models\CapitalCarTemp::find()->select([$column])->where(['id'=>$cap_car_id])->one();
		return count($model)>0?$model->$column:0;
   }
   public function actionView($id,$company_id){
   		
   		$searchModel = new \backend\models\VunioncapSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$dataProvider->query->where(['insure_company_id'=>$company_id]);
    	$dataProvider->query->pageSize = 50;

   		return $this->render('view',[
	   			'company_id' => $company_id,
	   			'dataProvider' => $dataProvider,
				'searchModel'=>$searchModel,
   			]);
   	   
   }
}