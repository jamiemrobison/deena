<?php

namespace backend\controllers;

use Yii;
use backend\models\Member;
use backend\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\BankAccount;
use yii\web\UploadedFile;
use backend\models\Modelfile;
use backend\models\DocuRef;
/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
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
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Member();
         $model_bankaccount = new BankAccount();
         $model_bankaccount = new BankAccount();
         $modelfile = new Modelfile();

        if ($model->load(Yii::$app->request->post()) && $modelfile->load(Yii::$app->request->post()) ) {

            $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');

            $fileupload = UploadedFile::getInstances($modelfile, 'file');
            $uploaded = UploadedFile::getInstance($model, 'photo');
            if(!empty($uploaded)){
                 // $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $uploaded)) {
                       $model->photo = $uploaded;
                    }
            }
            

           
            $model->applied_date = strtotime($model->applied_date);
            $model->expired_date = strtotime($model->expired_date);
            $model->dob = strtotime($model->dob);
            $model->card_into_expired = strtotime($model->card_into_expired);
            $model->income_expect = floatval(str_replace(",", "", $model->income_expect));
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
                        $model_account->party_type_id = 3; // 1 shop , 2 insure company , 3 member
                        $model_account->status = 1;
                        $model_account->save(false);
                 
                    }

                    
                }
                if(!empty($fileupload)){

                            foreach($fileupload as $file){
                                $model_doc = new DocuRef();
                               // $upfiles = time() . "." . $file->getExtension();
                                //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                                if ($file->saveAs('../web/uploads/files/' . $file)) {
                                   $model_doc->doc_type = $file->getExtension();
                                   $model_doc->doc_group_id = $modelfile->filecategory;
                                   $model_doc->name = $file;
                                   $model_doc->party_type_id = 3;
                                   $model_doc->party_id = $model->id;
                                   $model_doc->save(false);
                                }
                            }
                              
                        }else{
                             
                        }
                 return $this->redirect(['update', 'id' => $model->id]);
            }

            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'runno' => $model::getLastNo(),
                 'model_bankaccount' => $model_bankaccount,
                 'modelfile'=>$modelfile,
            ]);
        }
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_bankaccount = new BankAccount();
        $model_bankdata = BankAccount::find()->where(['party_type_id'=>3,'party_id'=>$id])->all();
        $model_filedata = DocuRef::find()->where(['party_type_id'=>3,'party_id'=>$id])->all();
        $modelfile = new Modelfile();

        if ($model->load(Yii::$app->request->post()) && $modelfile->load(Yii::$app->request->post()) ) {
            $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');
            //$uploaded = UploadedFile::getInstance($model, 'logo');

            //echo $id;return;

             $fileupload = UploadedFile::getInstances($modelfile, 'file');
            // echo count($fileupload);return;

            $oldlogo = Yii::$app->request->post('old_photo');
            $uploaded = UploadedFile::getInstance($model, 'photo');

            if(!empty($uploaded)){
                 // $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $uploaded)) {
                       $model->photo = $uploaded;
                    }
            }else{
                 $model->photo = $oldlogo;
            }

            $card_id = $model->card_id;
     
            $model->applied_date = strtotime($model->applied_date);
            $model->expired_date = strtotime($model->expired_date);
            $model->dob = strtotime($model->dob);
            $model->card_into_expired = strtotime($model->card_into_expired);
            $model->income_expect = floatval(str_replace(",", "", $model->income_expect));
            $model->card_id = $card_id;
            if($model->save(false)){
                if(count($bankid)>0){
                    BankAccount::deleteAll(['party_id'=>$id,'party_type_id'=>3]);
                    for($i=0;$i <= count($bankid)-1;$i++){
                        $model_account = new BankAccount();
                        $model_account->bank_id = $bankid[$i];
                        $model_account->name = $accountno[$i];
                        $model_account->account_no = $accountno[$i];
                        $model_account->account_type = $account_type[$i];
                        $model_account->brance = $brance[$i];
                        $model_account->party_id = $model->id;
                        $model_account->party_type_id = 3; // 3 member
                        $model_account->status = 1;
                        $model_account->save(false);
                 
                    }
                         
                   // return $this->redirect(['update', 'id' => $model->id]);
                }else{
                    BankAccount::deleteAll(['party_id'=>$id,'party_type_id'=>3]);
                }
                if(count($fileupload) > 0){
                            foreach($fileupload as $file){
                                $model_doc = new DocuRef();
                               // $upfiles = time() . "." . $file->getExtension();
                                //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                                if ($file->saveAs('../web/uploads/files/' . $file)) {
                                   $model_doc->doc_type = $file->getExtension();
                                   $model_doc->doc_group_id = $modelfile->filecategory;
                                   $model_doc->name = $file;
                                   $model_doc->party_type_id = 3;
                                   $model_doc->party_id = $model->id;
                                   $model_doc->save(false);
                                }
                            }
                              
                        }else{
                             
                        }
            }
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
                'model_bankdata' => $model_bankdata,
                'modelfile'=>$modelfile,
                'model_filedata'=> $model_filedata,
            
            ]);
        }
    }

    /**
     * Deletes an existing Member model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

 public function actionShowcity($id){
      $model = \common\models\Amphur::find()->where(['PROVINCE_ID' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {

              echo "<option value='" . $value->AMPHUR_ID . "'>$value->AMPHUR_NAME</option>";

          }
      } else {
          echo "<option>-</option>";
      }
    }
    public function actionShowdistrict($id){
      $model = \common\models\District::find()->where(['AMPHUR_ID' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {

              echo "<option value='" . $value->DISTRICT_ID . "'>$value->DISTRICT_NAME</option>";

          }
      } else {
          echo "<option>-</option>";
      }
    }
    public function actionShowzipcode($id){
       // return $id;
      $model = \common\models\Amphur::find()->where(['AMPHUR_ID' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {
              echo $value->POSTCODE;
          }
      } else {
          echo "";
      }
    }
    /**
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
   public function actionPdf($id){
    $fullpath = Yii::getAlias('@app'.'/web/uploads/files/'.$id);
    return Yii::$app->response->sendFile($fullpath,$id,['inline'=>true]);
   }

   public function actionRemovedoc(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
        
            //return $insure_text;
            if($id){
              // return $id;
                
                $model_memid = DocuRef::find()->where(['party_type_id'=>3,'id'=>$id])->one();
                DocuRef::deleteAll(['id'=>$id]);
                if(count($model_memid)>0){
                    $model = DocuRef::find()->where(['party_type_id'=>3,'party_id'=>$model_memid->party_id])->all();
                    return $this->renderPartial("_adddoc",['data'=>$model]);
                }
                  
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
}
