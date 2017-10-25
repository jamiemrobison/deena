<?php

namespace backend\controllers;

use Yii;
use backend\models\Quotation;
use backend\models\QuotationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuotationController implements the CRUD actions for Quotation model.
 */
class QuotationController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Quotation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuotationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quotation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Quotation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quotation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Quotation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       // $listid = split(',', $model->package_id);
        $listid = $model->package_id;

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

            // $sql = "SELECT product_package.id,product_price.alltotal from product_package INNER JOIN product_price ON product_package.id = product_price.package_id WHERE product_package.id in (".$listid.")";
            // $qury = Yii::$app->db->createCommand($sql);
            // $pricelist = $qury->queryAll();

            $sql = "SELECT quotation.id,quotation_detail.package_id,quotation_detail.id as lineid,quotation_detail.amount,product_package.company_insure FROM quotation INNER JOIN quotation_detail ON quotation.id = quotation_detail.quatation_id INNER JOIN product_package ON quotation_detail.package_id = product_package.id WHERE quotation_detail.quatation_id=".$id;
            $qury = Yii::$app->db->createCommand($sql);
            $pricelist = $qury->queryAll();
        
            $sql = "SELECT quotation.id,quotation_detail.package_id,quotation_detail.id as lineid,quotation_detail.act_amount,product_package.company_insure FROM quotation INNER JOIN quotation_detail ON quotation.id = quotation_detail.quatation_id INNER JOIN product_package ON quotation_detail.package_id = product_package.id WHERE quotation_detail.quatation_id=".$id;
            $qury = Yii::$app->db->createCommand($sql);
            $actprice = $qury->queryAll();
            
            $sql = "SELECT quotation.id,quotation_detail.package_id,quotation_detail.id as lineid,product_price.amount_start,product_price.amount_end FROM quotation INNER JOIN quotation_detail ON quotation.id = quotation_detail.quatation_id INNER JOIN product_package ON quotation_detail.package_id = product_package.id INNER JOIN product_price on quotation_detail.package_id = product_price.package_id WHERE quotation_detail.quatation_id=".$id;
            $qury = Yii::$app->db->createCommand($sql);
            $insurecost = $qury->queryAll();
            
           
            
            $sql = "SELECT amount,actprotect_id,coverage_type FROM v_packages where package_id in (".$listid.") ORDER BY v_packages.company_insure ASC ";
            $qury = Yii::$app->db->createCommand($sql);
            $amountlist1 = $qury->queryAll();

        if ($model->load(Yii::$app->request->post())) {
            $lineid = Yii::$app->request->post('line-id');
            $package_act = Yii::$app->request->post('package-act');
            $package_amt = Yii::$app->request->post('package-amt');
            // print_r($package_act);return;
            $model->quotation_date = strtotime($model->quotation_date);
            if($model->save()){
                if(count($package_amt)>0){
                    for($i=0;$i<=count($package_amt)-1;$i++){
                        $modelline = \backend\models\Quotationdetail::find()->where(['id'=>$lineid[$i]])->one();
                        $modelline->amount = str_replace(",", "", $package_amt[$i]);
                        $modelline->act_amount = str_replace(",", "", $package_act[$i]);
                        $modelline->save(false);
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'listid'=>$modellist,
                    'companylist'=>$comlist,
                    'servicelist'=>$servicelist,
                    'insuretypelist'=>$insuretypelist,
                    'amountlist1'=>$amountlist1,
                    'pricelist'=>$pricelist,
                    'actprice'=>$actprice,
                    'insurecost'=>$insurecost,
            ]);
        }
    }

    /**
     * Deletes an existing Quotation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quotation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quotation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function findCategory($id){
        $model = \backend\models\Product::find()->where(['id'=>$id])->one();
        return count($model)>0?$model->category_id:0;
    }
    public function actionGeninsure(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $packid = Yii::$app->request->post('packid');

            if($id){
                $model = Quotation::find()->where(['id'=>$id])->one();
                if($model){
                   // return $packid;
                    $modelpackage = \backend\models\Quotationdetail::find()->where(['quatation_id'=>$id,'package_id'=>$packid])->one();
                    $package = \backend\models\Package::find()->where(['id'=>$packid])->one();
                    $model_insure = new \backend\models\Insurance();
                    $model_insure->insure_code = $model_insure::getLastNo();
                    $model_insure->insure_company_id = $package->company_insure;
                    $model_insure->insure_type_id = $this->findCategory($package->insure_type);
                    $model_insure->product_id = $package->insure_type;
                    $model_insure->car_code = $package->car_code;
                    $model_insure->prefix = $model->prefix_id;
                    $model_insure->plate_category = $model->plate_category;
                    $model_insure->plate_license = $model->plate_number;
                    $model_insure->plate_province = $model->plate_province;
                    $model_insure->fname = $model->fname;
                    $model_insure->lname = $model->lname;
                    $model_insure->car_brand = $model->car_brand;
                    $model_insure->car_model = $model->car_model;
                    $model_insure->car_year = $model->car_year;
                    $model_insure->quotation_id = $model->id;
                    $model_insure->grand_total = $modelpackage->amount;
                    $model_insure->status = 0;
                    


                    if($model_insure->save(false)){
                        return $model_insure->insure_code;
                    }
                }
            }
        }
    }
}
