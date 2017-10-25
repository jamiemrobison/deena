<?php

namespace backend\controllers;

use Yii;
use backend\models\Shop;
use backend\models\ShopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\BankAccount;

/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ShopController extends Controller
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
     * Lists all Shop models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new ShopSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
       $model_bankaccount = new BankAccount();
        $modelx = Shop::find()->one();
        if(count($modelx)>0){
            return $this->redirect(['update','id'=>$modelx->id]);
        }
        $model = new Shop();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
            ]);
        }
    }

    /**
     * Displays a single Shop model.
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
     * Creates a new Shop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shop();
         $model_bankaccount = new BankAccount();
        if ($model->load(Yii::$app->request->post())) {
            $uploaded = UploadedFile::getInstance($model, 'logo');
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                       $model->logo = $upfiles;
                    }
            }
            if($model->save()){
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
            ]);
        }
    }

    /**
     * Updates an existing Shop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_bankdata = BankAccount::find()->where(['party_type_id'=>1,'party_id'=>$id])->all();
        $model_bankaccount = new BankAccount();

        if ($model->load(Yii::$app->request->post())) {
            //var_dump($_POST);return;
            $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $oldlogo = Yii::$app->request->post('old_logo');
            $brance = Yii::$app->request->post('brance');

            //echo $accountno[0];return;
             $uploaded = UploadedFile::getInstance($model, 'logo');
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                       $model->logo = $upfiles;
                    }
            }else{
                 $model->logo = $oldlogo;
            }

            if($model->save()){
                if(count($bankid)>0){
                    BankAccount::deleteAll(['party_id'=>$id]);
                    for($i=0;$i <= count($bankid)-1;$i++){
                        $model_account = new BankAccount();
                        $model_account->bank_id = $bankid[$i];
                        $model_account->name = $accountno[$i];
                        $model_account->account_no = $accountno[$i];
                        $model_account->brance = $brance[$i];
                        $model_account->party_id = $model->id;
                        $model_account->party_type_id = 1; // 1 shop
                        $model_account->status = 1;
                        $model_account->save(false);
                 
                    }
                    
                }
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
                'model_bankdata' => $model_bankdata,
            ]);
        }
    }

    /**
     * Deletes an existing Shop model.
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
     * Finds the Shop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shop::findOne($id)) !== null) {
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
            //return $id;
            if($id){
               // return $desc;
                $data = [];
                $data['id'] = $id;
                $data['bank_name'] = $bank_name;
                $data['account_no'] = $account_no;
                $data['brance'] = $brance;

                return $this->renderPartial("_addbank",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
}
