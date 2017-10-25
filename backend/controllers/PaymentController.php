<?php

namespace backend\controllers;

use Yii;
use backend\models\Payment;
use backend\models\Promotion;
use backend\models\PaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Installment;
use backend\models\Insurance;
use kartik\mpdf\Pdf;


/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
{
   public $enableCsrfValidation = false;
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
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $model = $this->findModel($id);
        $model_insure = Insurance::find()->where(['id'=>$model->insure_no])->one();
        $model_installment = Installment::find()->where(['insure_no'=>$model->insure_no])->one();
        return $this->render('view', [
            'model' => $model,
            'model_insure' => $model_insure,
            'model_installment' => $model_installment,
        ]);
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
        $model = new Payment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }
     public function actionCreate2()
    { 
        $insureid = 0;
        $session = Yii::$app->session;
        if(isset($session['insure_id'])){
            $insureid = $session['insure_id'];
        }
        $model = new Payment();
        $installment_model = new \backend\models\Installment();
        $paymentdata = \backend\models\Payment::find()->where(['insure_no'=>$insureid])->all();
        $installment = \backend\models\Installment::find()->where(['insure_no'=>$insureid])->one();
        $insure_payment_data = Insurance::find()->where(['id'=>$insureid])->one();
        $count_period = $this->getpayment($insureid);

        if ($model->load(Yii::$app->request->post())) {
            $insureid = Yii::$app->request->post('insureid');
            $paymethod = Yii::$app->request->post('payment_method');
            $model->payment_date = strtotime($model->payment_date);
            $model->insure_no = $insureid;
             
            // print_r($model);return;
             $uploaded = UploadedFile::getInstance($model, 'attachfile');
            if(!empty($uploaded)){
                  //$upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/files/' . $uploaded)) {
                       $model->attachfile = $uploaded;
                    }
            }else{
               // $model->attachfile = $uploaded;
            }
             $model->payment_method = $paymethod;
            if($model->save(false)){
                if($this->getPaymentstatus($insureid)==1){
                    $model_insure = \backend\models\Insurance::find()->where(['id'=>$insureid])->one();
                    $model_insure->status = 2;
                    $model_insure->save(false);
                }

                // $check_has = Installment::find()->where(['insure_no'=>$insureid])->count();
                // if($check_has > 0){
                //     $install = Installment::find()->where(['insure_no'=>$insureid])->one();
                //     $install->payment_type = 1;
                //     $install->period = $installment_model->preriod;
                //     $install->first_period = $installment_model->first_period;
                //     $install->remain = $installment_model->remain;
                //     $install->period_per = $installment_model->period_per;
                //     $install->insure_no = $insureid;
                //     $install->save(false);
                // }else{
                //     $install = new Installment();
                //     $install->payment_type = 1;
                //     $install->period = $installment_model->preriod;
                //     $install->first_period = $installment_model->first_period;
                //     $install->remain = $installment_model->remain;
                //     $install->period_per = $installment_model->period_per;
                //     $install->insure_no = $insureid;
                //     $install->save(false);
                // }
               
                $session = Yii::$app->session;
                $session->setFlash('msg', 'บันทึกรายการชำระเงินเรียบร้อยแล้ว');
               return $this->redirect(['/insurance/update', 'id' => $insureid]);
            }
        } else {
            if(isset($session['insure_id'])){
                 return $this->renderAjax('create', [
                'model' => $model,
                'insureid'=>$insureid,
                'runno' => $model::getLastNo(),
                'paymentdata' => $paymentdata,
                'installment_model'=>$installment_model,
                'insure_payment_data'=>$insure_payment_data,
                'installment'=>$installment,
                'count_period'=>$count_period,
            ]);
            }
           
        }
    }
    public function getPaymentstatus($id){
        $payment_all = \backend\models\Insurance::getPaymentsum($id);
        $price = \backend\models\Payment::getPrice($id);
        if($payment_all >= $price){
            return 1;
        }else{
            return 0;
        }
    }
    public function actionSetpaymentid(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('insure_id');
            if($id!=''){
                 $session = Yii::$app->session;
                 $session['insure_id'] = Yii::$app->request->post('insure_id');
            }
           
        }
    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Payment model.
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
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionShowaccount($id){
      $model = \backend\models\BankAccount::find()->where(['bank_id' => $id,'party_type_id'=>1])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {
              echo "<option value='" . $value->id . "'>$value->account_no</option>";
          }
      } else {
          echo "<option>-</option>";
      }
    }
    public function getpayment($id){
      $countperiod = 1;
      $model = Insurance::find()->where(['id'=>$id])->one();
      if($model){
        $paytype = Promotion::getPromotioninfo($model->payment_method);
        if($paytype != null){
           if(in_array($paytype, ["5,6,7"])){
                $countperiod = (1 + $this->getCountperiod($id));
            }else{
                $countperiod = (1 + $this->getCountperiod($id));
            }
        }else{
          return $countperiod;
        }
       
      }
      return $countperiod;
    }
    public function getCountperiod($id){
      $model = Payment::find()->where(['insure_no'=>$id])->count();
      return $model;
    }
    public function actionPrintreceipt(){

      $id = Yii::$app->request->post('list');
      if($id){
        $model = Payment::find()->where(['id'=>$id])->one();
        $model_insure = Insurance::find()->where(['id'=>$model->insure_no])->one();
        if($model){
              $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4, 
                'orientation' => Pdf::ORIENT_PORTRAIT,
                'destination' => Pdf::DEST_BROWSER, 
                'content' => $this->renderPartial('_receipt',[
                  'model' => $model,
                  'model_insure'=>$model_insure,
                  // 'listid'=>$modellist,
                  // 'companylist'=>$comlist,
                  // 'servicelist'=>$servicelist,
                  // 'insuretypelist'=>$insuretypelist,
                  // 'amountlist1'=>$amountlist1,
                  // 'pricelist'=>$pricelist,
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
    }
}
