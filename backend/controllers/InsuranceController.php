<?php

namespace backend\controllers;

use Yii;
use backend\models\Insurance;
use backend\models\InsuranceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Modelfile;
use backend\models\DocuRef;
use backend\models\Package;
use backend\models\Installment;
use backend\models\PaymentChannel;
use yii\web\ForbiddenHttpException;
use backend\models\Packagedetail;


/**
 * InsuranceController implements the CRUD actions for Insurance model.
 */
class InsuranceController extends Controller
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
     * Lists all Insurance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InsuranceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Insurance model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $role_act = \backend\models\Userrole::checkRoleEnable("insurance");
        if($role_act[0]['view'] == 1){   
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Creates a new Insurance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Insurance();
        $modelfile = new Modelfile();
        $installment_model = new \backend\models\Installment();

        $role_act = \backend\models\Userrole::checkRoleEnable("insurance");
        if($role_act[0]['create'] == 1){  

                      if ($model->load(Yii::$app->request->post()) && $modelfile->load(Yii::$app->request->post()) && $installment_model->load(Yii::$app->request->post()) ) {

                          $fileupload = UploadedFile::getInstances($modelfile, 'file');

                          $model->protect_start_date = strtotime($model->protect_start_date);
                          $model->protect_end_date = strtotime($model->protect_end_date);
                          $model->receive_date = strtotime($model->receive_date);
                          $model->driver_date_one = strtotime($model->driver_date_one);
                          $model->driver_date_two = strtotime($model->driver_date_two);
                          $model->insure_renew_date = strtotime($model->insure_renew_date);

                          if($model->save()){
                                    if(!empty($fileupload)){
                                                    foreach($fileupload as $file){
                                                        $model_doc = new DocuRef();
                                                       // $upfiles = time() . "." . $file->getExtension();
                                                        //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                                                        if ($file->saveAs('../web/uploads/files/' . $file)) {
                                                           $model_doc->doc_type = $file->getExtension();
                                                           $model_doc->doc_group_id = $modelfile->filecategory;
                                                           $model_doc->name = $file;
                                                           $model_doc->party_type_id = 4; // 4 insure
                                                           $model_doc->party_id = $model->id;
                                                           $model_doc->save(false);
                                                        }
                                                    }
                                            
                                      }else{
                                           
                                      }

                             
                                  $install = new Installment();
                                  $install->payment_type = 1;
                                  $install->period = $installment_model->period;
                                  $install->first_period = str_replace(",","",$installment_model->first_period);
                                  $install->remain = $installment_model->remain;
                                  $install->period_per = str_replace(",","",$installment_model->period_per);
                                  $install->insure_no = $insureid;
                                  $install->save(false);
                              
                            $session = Yii::$app->session;
                            $session->setFlash('msg', 'บันทึกรายการเรียบร้อยแล้ว');
                            return $this->redirect(['update', 'id' => $model->id]);  
                          }
                          
                      } else {
                          return $this->render('create', [
                              'model' => $model,
                              'runno' => $model::getLastNo(),
                              'modelfile'=>$modelfile,
                              'installment_model'=>$installment_model,
                          ]);
                      }
            }else{
              throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
              
            }
    }

    public function getRuning(){
        $model = Insurance::find()->max();
    }

    /**
     * Updates an existing Insurance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelfile = new Modelfile();
        $paymentdata = \backend\models\Payment::find()->where(['insure_no'=>$id])->all();
        $model_filedata = DocuRef::find()->where(['party_type_id'=>4,'party_id'=>$id])->all(); //4 insurance
        $modelfile = new Modelfile();
        $installment_model = new \backend\models\Installment();
        $installment_data = Installment::find()->where(['insure_no'=>$id])->one();

        $insure_package = Packagedetail::find()->where(['package_id'=>$model->package_id])->all();
      
        $role_act = \backend\models\Userrole::checkRoleEnable("insurance");
        if($role_act[0]['modified'] == 1){  
                   if ($model->load(Yii::$app->request->post()) && $modelfile->load(Yii::$app->request->post())  && $installment_model->load(Yii::$app->request->post()) ) {
                        $model->protect_start_date = strtotime($model->protect_start_date);
                        $model->protect_end_date = strtotime($model->protect_end_date);
                        $model->receive_date = strtotime($model->receive_date);
                        $model->driver_date_one = strtotime($model->driver_date_one);
                        $model->driver_date_two = strtotime($model->driver_date_two);
                        $model->insure_renew_date = strtotime($model->insure_renew_date);
                        $model->note_date = strtotime($model->note_date);

                        $fileupload = UploadedFile::getInstances($modelfile, 'file');


                        if($model->save(false)){
                                    if(!empty($fileupload)){
                                                  foreach($fileupload as $file){
                                                      $model_doc = new DocuRef();
                                                     // $upfiles = time() . "." . $file->getExtension();
                                                      //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                                                      if ($file->saveAs('../web/uploads/files/' . $file)) {
                                                         $model_doc->doc_type = $file->getExtension();
                                                         $model_doc->doc_group_id = $modelfile->filecategory;
                                                         $model_doc->name = $file;
                                                         $model_doc->party_type_id = 4; // 4 insure
                                                         $model_doc->party_id = $model->id;
                                                         $model_doc->save(false);
                                                      }
                                                  }
                                          
                                    }else{
                                         
                                    }
                            $check_has = Installment::find()->where(['insure_no'=>$model->id])->count();
                            if($check_has > 0){
                                $install = Installment::find()->where(['insure_no'=>$model->id])->one();
                                $install->payment_type = 1;
                                $install->period = $installment_model->period;
                                $install->first_period = str_replace(",","",$installment_model->first_period);
                                $install->remain = $installment_model->remain;
                                $install->period_per = str_replace(",","",$installment_model->period_per);
                                $install->insure_no = $model->id;
                                $install->save(false);
                            }else{
                                $install = new Installment();
                                $install->payment_type = 1;
                                $install->period = $installment_model->period;
                                $install->first_period = str_replace(",","",$installment_model->first_period);
                                $install->remain = $installment_model->remain;
                                $install->period_per = str_replace(",","",$installment_model->period_per);
                                $install->insure_no = $model->id;
                                $install->save(false);
                            }
                            $session = Yii::$app->session;
                            $session->setFlash('msg', 'บันทึกรายการเรียบร้อยแล้ว');
                            return $this->redirect(['update', 'id' => $model->id]);
                        }
                        
                    } else {
                        return $this->render('update', [
                            'model' => $model,
                            'modelfile'=>$modelfile,
                            'paymentdata'=>$paymentdata,
                              'modelfile'=>$modelfile,
                            'model_filedata'=> $model_filedata,
                            'installment_model'=>$installment_model,
                            'installment_data'=>$installment_data,
                            'insure_package' => $insure_package,
                        ]);
                    }
         }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
         }           
    }

    public function actionCopyinsure(){
      if(Yii::$app->request->isPost){
        $id = Yii::$app->request->post('id');
        if($id!=''){
        $model = Insurance::findOne($id);
        $model_copy = new Insurance();
        $model_copy->attributes = $model->attributes;
        $model_copy->insure_code = $model::getLastNo();
        $model_copy->status = 0;
        $model_copy->ref_id = $id;
        $model_copy->save(false);
        $session = Yii::$app->session;
        $session->setFlash('msg', 'ทำสำเนารายการเรียบร้อยแล้ว');
        return $this->redirect(['update', 'id' => $model_copy->id]);
      }
      }
    }

    /**
     * Deletes an existing Insurance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         $role_act = \backend\models\Userrole::checkRoleEnable("insurance");
        if($role_act[0]['delete'] == 1){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Finds the Insurance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Insurance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Insurance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
    public function actionShowmodel($id){
      $model = \backend\models\Carinfo::find()->where(['brand' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {
               $caryear = $value->findCaryear($value->car_year);
               $carname = $value->model.' '.$caryear;
              echo "<option value='" . $value->id . "'>$value->model</option>";

          }
      } else {
          echo "<option>-</option>";
      }
    }
    public function actionShowproduct($id){
      $model = \backend\models\Package::find()->where(['company_insure' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {
            $name = \backend\models\Product::getProdcode($value->insure_type);
              echo "<option value='" . $value->insure_type . "'>$name</option>";

          }
      } else {
          echo "<option>-</option>";
      }
    }
     public function actionShowcarcode($id){
      $model = \backend\models\Car::find()->where(['status' =>1])->all();

      if (count($model) > 0) {
           echo "<option value='0'>เลือกรายการ</option>";
          foreach ($model as $value) {
            $txt = '';
            if($id == 1){
              $txt = $value->car_code;
            }else{
              $txt = $value->act_code;
            }
              echo "<option value='" . $value->id . "'>$txt</option>";
          }
      } else {
          echo "<option>-</option>";
      }
    }
    public function actionShowcaract($id){
          $model = \backend\models\Act::find()->where(['id' =>$id])->one();
            
            if (count($model) > 0) {
                 echo \backend\models\Cartype::getCarTypeName($model->car_type_id).",".$model->tax_premium.",".$model->all_premium;
               // echo $model->car_description;
            } else {
                echo '';
            }
      
    }
    public function actionPdf($id){
      if($id!=''){
         $fullpath = Yii::getAlias('@app'.'/web/uploads/files/'.$id);
    return Yii::$app->response->sendFile($fullpath,$id,['inline'=>true]);
      }
   
   }
   public function actionCheckpaytype($id){
    
       $model = PaymentChannel::find()->where(['id'=>$id])->one();
       if($model){
        return $model->type_id;
       }else{
        return 0;
       }
     
   }
   public function actionRemovedoc(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
        
            //return $insure_text;
            if($id){
              // return $id;
                
                $model_memid = DocuRef::find()->where(['party_type_id'=>4,'id'=>$id])->one();
                DocuRef::deleteAll(['id'=>$id]);
                if(count($model_memid)>0){
                    $model = DocuRef::find()->where(['party_type_id'=>4,'party_id'=>$model_memid->party_id])->all();
                    return $this->renderPartial("_adddoc",['data'=>$model]);
                }
                  
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
     public function actionGetlevel($id){
      $model = \backend\models\Member::find()->where(['id' =>$id])->one();

      if (count($model) > 0) {
          $data = \backend\models\Memberlevel::find()->where(['id' =>$model->level_id])->one();
          echo "<option value='" . $data->id . "'>$data->level</option>";
      } else {
          echo "<option>-</option>";
      }
    }
     public function actionGetintro($id){
      $model = \backend\models\Member::find()->where(['id' =>$id])->one();
      //echo "<option>-</option>";return;
      if (count($model) > 0) {
          //$data = \backend\models\Introduce::find()->where(['id' =>$model->intro_code])->one();
           $into = $this->getIntrocode($model->member_into);
          echo "<option value='" . $model->member_into . "'>$into</option>";
      } else {
          echo "<option>-</option>";
      }
    }
    public function actionGetintroMember($id){
      $model = \backend\models\Member::find()->where(['id' =>$id])->one();

      if (count($model) > 0) {
         // $data = \backend\models\Introduce::find()->where(['id' =>$model->intro_code])->one();
          echo "<option value='" . $data->intro_code . "' selected>$data->intro_code</option>";
      } else {
          echo "<option>-</option>";
      }
    }
     public function actionGetline($id){
      $model = \backend\models\Member::find()->where(['id' =>$id])->one();

      if (count($model) > 0) {
          $data = \backend\models\Line::find()->where(['id' =>$model->line_code])->one();
          echo "<option value='" . $data->id . "'>$data->line_code</option>";
      } else {
          echo "<option>-</option>";
      }
    }
    public static function getIntrocode($id){
      $model = \backend\models\Member::find()->where(['id'=>$id])->one();
      return count($model)>0?$model->member_code." [".$model->first_name." ".$model->last_name." ]":'';
    }
    
}
