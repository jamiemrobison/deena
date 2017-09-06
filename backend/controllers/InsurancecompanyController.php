<?php

namespace backend\controllers;

use Yii;
use backend\models\Insurancecompany;
use backend\models\InsurancecompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\BankAccount;
use backend\models\CommissionInsure;

/**
 * InsurancecompanyController implements the CRUD actions for Insurancecompany model.
 */
class InsurancecompanyController extends Controller
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
     * Lists all Insurancecompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InsurancecompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Insurancecompany model.
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
     * Creates a new Insurancecompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Insurancecompany();
        $model_bankaccount = new BankAccount();
        $model_commission = new CommissionInsure();

        if ($model->load(Yii::$app->request->post())) {
           
            $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');
            $uploaded = UploadedFile::getInstance($model, 'logo');

            $insure_id = Yii::$app->request->post('commission_id');
            $promotion = Yii::$app->request->post('promotion');
            $commission_per = Yii::$app->request->post('commission_per');
            $commission_amount = Yii::$app->request->post('commission_amount');
            
            //echo $insure_id[0];return;
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                       $model->logo = $upfiles;
                    }
            }
            if($model->save()){
                if(count($bankid)>0){
                  //  BankAccount::deleteAll(['party_id'=>$id]);
                    for($i=0;$i <= count($bankid)-1;$i++){
                        $model_account = new BankAccount();
                        $model_account->bank_id = $bankid[$i];
                        $model_account->name = $accountno[$i];
                        $model_account->account_no = $accountno[$i];
                        $model_account->account_type = $account_type[$i];
                        $model_account->brance = $brance[$i];
                        $model_account->party_id = $model->id;
                        $model_account->party_type_id = 2; // 1 insure company
                        $model_account->status = 1;
                        $model_account->save(false);
                 
                    }
                    
                }
                if(count($insure_id)>0){
                  //  BankAccount::deleteAll(['party_id'=>$id]);
                    for($i=0;$i <= count($insure_id)-1;$i++){
                        $model_commis = new CommissionInsure();
                        $model_commis->insure_type = $insure_id[$i];
                        $model_commis->commission_name = $promotion[$i];
                        $model_commis->commission_per = $commission_per[$i];
                        $model_commis->commission_amont = $commission_amount[$i];
                        $model_commis->insure_company_id = $model->id;
                        $model_commis->status = 1;
                        $model_commis->save(false);
                 
                    }
                    
                }
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
                'model_commission' => $model_commission,
            ]);
        }
    }

    /**
     * Updates an existing Insurancecompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_bankaccount = new BankAccount();
        $model_commission = new CommissionInsure();
        $model_bankdata = BankAccount::find()->where(['party_type_id'=>2,'party_id'=>$id])->all();
        $model_commissiondata = CommissionInsure::find()->where(['insure_company_id'=>$id])->all();

        if ($model->load(Yii::$app->request->post())) {

             $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');
            $uploaded = UploadedFile::getInstance($model, 'logo');

            $insure_id = Yii::$app->request->post('commission_id');
            $promotion = Yii::$app->request->post('promotion');
            $commission_per = Yii::$app->request->post('commission_per');
            $commission_amount = Yii::$app->request->post('commission_amount');

            $uploaded = UploadedFile::getInstance($model, 'logo');
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                       $model->logo = $upfiles;
                    }
            }
            if($model->save()){
                if(count($bankid)>0){
                    BankAccount::deleteAll(['party_id'=>$id,'party_type_id'=>2]);
                    for($i=0;$i <= count($bankid)-1;$i++){
                        $model_account = new BankAccount();
                        $model_account->bank_id = $bankid[$i];
                        $model_account->name = $accountno[$i];
                        $model_account->account_no = $accountno[$i];
                        $model_account->account_type = $account_type[$i];
                        $model_account->brance = $brance[$i];
                        $model_account->party_id = $model->id;
                        $model_account->party_type_id = 2; // 1 insure company
                        $model_account->status = 1;
                        $model_account->save(false);
                 
                    }
                    
                }
                if(count($insure_id)>0){
                     CommissionInsure::deleteAll(['insure_company_id'=>$id]);
                    for($i=0;$i <= count($insure_id)-1;$i++){
                        $model_commis = new CommissionInsure();
                        $model_commis->insure_type = $insure_id[$i];
                        $model_commis->promotion_name = $promotion[$i];
                        $model_commis->commission_percent = $commission_per[$i];
                        $model_commis->commission_amont = $commission_amount[$i];
                        $model_commis->insure_company_id = $model->id;
                        $model_commis->status = 1;
                        $model_commis->save(false);
                 
                    }
                    
                }
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
                'model_bankdata' => $model_bankdata,
                'model_commission' => $model_commission,
                'model_commissiondata' => $model_commissiondata,
            ]);
        }
    }

    /**
     * Deletes an existing Insurancecompany model.
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
     * Finds the Insurancecompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Insurancecompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Insurancecompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionAddbank(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $bank_name = Yii::$app->request->post('txt');
            $account_no = Yii::$app->request->post('account');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');
           // return $account_type;
            if($id){
               // return $desc;
                $data = [];
                $data['id'] = $id;
                $data['bank_name'] = $bank_name;
                $data['account_no'] = $account_no;
                $data['brance'] = $brance;
                $data['account_type'] = $account_type;

                return $this->renderPartial("_addbank",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionAddcommission(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $promotion = Yii::$app->request->post('promotion');
            $disc_per = Yii::$app->request->post('disc_per');
            $amount = Yii::$app->request->post('amount');
            $insure_text = Yii::$app->request->post('txt');
            //return $insure_text;
            if($id){
               // return $desc;
                $data = [];
                $data['id'] = $id;
                $data['promotion'] = $promotion;
                $data['disc_per'] = $disc_per;
                $data['amount'] = $amount;
                $data['insure_text'] = $insure_text;

                return $this->renderPartial("_addcommission",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
}
