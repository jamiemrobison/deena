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
use backend\models\Contact;
use yii\helpers\Json;
use yii\web\Response;
use backend\models\Bank;
use common\models\VCompanyCom;
use backend\models\Modelfile;
use backend\models\DocuRef;
use backend\models\Cargroupcompany;
use backend\models\Cargroupdetail;
use app\base\Model;

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
        $model_contact = new Contact();
        $model_company_com = VCompanyCom::find()->all();
        $modelfile = new Modelfile();

        $model_cargroup = new Cargroupcompany();
        $model_cargroup_detail = [new Cargroupdetail];

        if ($model->load(Yii::$app->request->post()) && $modelfile->load(Yii::$app->request->post())) {
           
            $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');

            $fileupload = UploadedFile::getInstances($modelfile, 'file');
            $uploaded = UploadedFile::getInstance($model, 'logo');

            $insure_id = Yii::$app->request->post('commission_id');
            $promotion = Yii::$app->request->post('promotion');
            $commission_per = Yii::$app->request->post('commission_per');
            $commission_amount = Yii::$app->request->post('commission_amount');

            $contact_id = Yii::$app->request->post('id');
            $section = Yii::$app->request->post('contact_section');
            $title = Yii::$app->request->post('contact_title');
            $name = Yii::$app->request->post('name');
            $contact_type = Yii::$app->request->post('contact_type_id');
            $txt = Yii::$app->request->post('contact_txt');
            $phone1 = Yii::$app->request->post('phone1');
            $phone2 = Yii::$app->request->post('phone2');
            $email1 = Yii::$app->request->post('email1');
            $email2 = Yii::$app->request->post('email2');
           
            //echo $insure_id[0];return;
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                       $model->logo = $upfiles;
                    }
            }
             $model->credit_limit =floatval(str_replace(",", "", $model->credit_limit));
            $model->reg_capital =floatval(str_replace(",", "", $model->reg_capital));
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
                        $model_commis->promotion_name = $promotion[$i];
                        $model_commis->commission_percent = $commission_per[$i];
                        $model_commis->commission_amont = $commission_amount[$i];
                        $model_commis->insure_company_id = $model->id;
                        $model_commis->status = 1;
                        $model_commis->save(false);
                 
                    }
                    
                }
                if(count($section)>0){
                  //  BankAccount::deleteAll(['party_id'=>$id]);
                    for($i=0;$i <= count($section)-1;$i++){
                        $model_contact = new Contact();
                        $model_contact->contact_title = $title[$i];
                        $model_contact->contact_section = $section[$i];
                        $model_contact->name = $name[$i];
                        $model_contact->contact_type_id = $contact_type[$i];
                        $model_contact->contact_txt = $txt[$i];
                        $model_contact->party_id = $model->id;
                        $model_contact->party_type_id = 2; // 1 insure company
                        $model_contact->status = 1;
                        $model_contact->phone1 = $phone1[$i];
                        $model_contact->phone2 = $phone2[$i];
                        $model_contact->email1 = $email1[$i];
                        $model_contact->email2 = $email2[$i];
                        $model_contact->save(false);
                 
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
                                   $model_doc->party_type_id = 2;
                                   $model_doc->party_id = $model->id;
                                   $model_doc->save(false);
                                }
                            }
                              
                        }else{
                             
                        }
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_bankaccount' => $model_bankaccount,
                'model_commission' => $model_commission,
                'model_contact' => $model_contact,
                'model_company_com' => $model_company_com,
                'modelfile'=>$modelfile,
                 'model_cargroup' => $model_cargroup,
                // 'model_cargroup_detail' => (empty($model_cargroup_detail)) ? [new Cargroupdetail] : $model_cargroup_detail,
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
        $model_contact = new Contact();
        $model_commission = new CommissionInsure();
        $model_bankdata = BankAccount::find()->where(['party_type_id'=>2,'party_id'=>$id])->all();
        $model_commissiondata = CommissionInsure::find()->where(['insure_company_id'=>$id])->all();
        $model_contactdata = Contact::find()->where(['party_type_id'=>2,'party_id'=>$id])->all();
        $model_company_com = VCompanyCom::find()->all();

        $model_filedata = DocuRef::find()->where(['party_type_id'=>2,'party_id'=>$id])->all();
        $modelfile = new Modelfile();
        $model_cargroup = new Cargroupcompany();
         $model_cargroup_detail = Cargroupcompany::find()->where(['insure_company_id'=>$id])->all();

        if ($model->load(Yii::$app->request->post()) && $modelfile->load(Yii::$app->request->post())) {

            $bankid = Yii::$app->request->post('bank_id');
            $accountno = Yii::$app->request->post('account_no');
            $brance = Yii::$app->request->post('brance');
            $account_type = Yii::$app->request->post('account_type');
            $uploaded = UploadedFile::getInstance($model, 'logo');

            $insure_id = Yii::$app->request->post('commission_id');
            $promotion = Yii::$app->request->post('promotion');
            $commission_per = Yii::$app->request->post('commission_per');
            $commission_amount = Yii::$app->request->post('commission_amount');
            $oldlogo = Yii::$app->request->post('old_logo');
            //echo $commission_amount[0];return;
             $contact_id = Yii::$app->request->post('id');
            $section = Yii::$app->request->post('contact_section');
            $title = Yii::$app->request->post('contact_title');
            $name = Yii::$app->request->post('name');
            $contact_type = Yii::$app->request->post('contact_type_id');
            $txt = Yii::$app->request->post('contact_txt');
            $phone1 = Yii::$app->request->post('phone1');
            $phone2 = Yii::$app->request->post('phone2');
            $email1 = Yii::$app->request->post('email1');
            $email2 = Yii::$app->request->post('email2');


            $fileupload = UploadedFile::getInstances($modelfile, 'file');
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
            $model->credit_limit =floatval(str_replace(",", "", $model->credit_limit));
            $model->reg_capital =floatval(str_replace(",", "", $model->reg_capital));
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
                if(count($section)>0){
                    Contact::deleteAll(['party_id'=>$id,'party_type_id'=>2]);
                    for($i=0;$i <= count($section)-1;$i++){
                        $model_contact = new Contact();
                        $model_contact->contact_title = $title[$i];
                        $model_contact->contact_section = $section[$i];
                        $model_contact->name = $name[$i];
                        $model_contact->contact_type_id = $contact_type[$i];
                        $model_contact->contact_txt = $txt[$i];
                        $model_contact->party_id = $model->id;
                        $model_contact->party_type_id = 2; // 1 insure company
                        $model_contact->status = 1;
                        $model_contact->phone1 = $phone1[$i];
                        $model_contact->phone2 = $phone2[$i];
                        $model_contact->email1 = $email1[$i];
                        $model_contact->email2 = $email2[$i];
                        $model_contact->save(false);
                 
                    }
                    
                }else{
                    Contact::deleteAll(['party_id'=>$id,'party_type_id'=>2]);
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
                                   $model_doc->party_type_id = 2;
                                   $model_doc->party_id = $model->id;
                                   $model_doc->save(false);
                                }
                            }
                              
                        }else{
                             
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
                'model_contactdata' => $model_contactdata,
                'model_contact' => $model_contact,
                'model_company_com' => $model_company_com,
                 'modelfile'=>$modelfile,
                'model_filedata'=> $model_filedata,
                'model_cargroup'=>$model_cargroup,
                'model_cargroup_detail'=>$model_cargroup_detail,
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
    public function actionCopycommission(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $model = CommissionInsure::find()->where(['insure_company_id'=>$id])->all();
            if(count($model)>0){

                return $this->renderPartial("_copycommission",['data'=>$model]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionAddcontact(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $section = Yii::$app->request->post('section');
            $title = Yii::$app->request->post('title');
            $title_name = Yii::$app->request->post('title_name');
            $name = Yii::$app->request->post('name');
            $type = Yii::$app->request->post('type');
            $txt = Yii::$app->request->post('txt');

            $phone1 = Yii::$app->request->post('phones1');
            $phone2 = Yii::$app->request->post('phones2');
            $email1 = Yii::$app->request->post('emails1');
            $email2 = Yii::$app->request->post('emails2');
            if($section){
               // return $desc;
                $data = [];
                $data['id'] = $id;
                $data['contact_section'] = $section;
                $data['contact_title'] = $title;
                $data['name'] = $name;
                $data['contact_type_id'] = $type;
                $data['contact_txt'] = $txt;
                $data['title_name'] = $title_name;
                $data['phone1'] = $phone1;
                $data['phone2'] = $phone2;
                $data['email1'] = $email1;
                $data['email2'] = $email2;

                return $this->renderPartial("_addcontact",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionFindbankdata(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post("id");
            if($id){
                $model = Bank::find()->where(['id'=>$id])->one();
                if($model){
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    $data = ['short_name'=>$model->short_name,'logo'=>$model->logo];
                    return $data; 
                }
            }
        }
    }
    public function actionRemovedoc(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
        
            //return $insure_text;
            if($id){
              // return $id;
                
                $model_memid = DocuRef::find()->where(['party_type_id'=>2,'id'=>$id])->one();
                DocuRef::deleteAll(['id'=>$id]);
                if(count($model_memid)>0){
                    $model = DocuRef::find()->where(['party_type_id'=>2,'party_id'=>$model_memid->party_id])->all();
                    return $this->renderPartial("_adddoc",['data'=>$model]);
                }
                  
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionAddcar(){
        if(Yii::$app->request->isAjax){     
             return $this->renderPartial("_addcar");
            }else{
                return;
            }
        
       // $data = Yii::$app->request->post("data");
        
    }
     public function actionAddcargroup(){
        if(Yii::$app->request->isAjax){
             $recid = Yii::$app->request->post('id');     
             $name = Yii::$app->request->post('gname');     
             $desc = Yii::$app->request->post('gdesc');    


             if($name!=''){
                $model = new Cargroupcompany();
                $model->insure_company_id = $recid;
                $model->name = $name;
                $model->description = $desc;
                $model->save(false);
             } 
                $data = Cargroupcompany::find()->where(['insure_company_id'=>$recid])->all();
                if(count($data)>0){
                    return $this->renderPartial("_grouplist",['data'=>$data]);
                }
             
            }else{
                return;
            }
        
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionRemovecargroup(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $comid = Yii::$app->request->post('comid');
        
            //return $insure_text;
            if($id){
              // return $id;   
                Cargroupcompany::deleteAll(['id'=>$id]);
                $model_memid = Cargroupcompany::find()->where(['insure_company_id'=>$comid])->all();
               // DocuRef::deleteAll(['id'=>$id]);
               // return count($model_memid);
                if(count($model_memid)>0){
                    //$model = DocuRef::find()->where(['party_type_id'=>2,'party_id'=>$model_memid->party_id])->all();
                    return $this->renderPartial("_grouplist",['data'=>$model_memid]);
                }
                  
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionAddcarlist(){
        if(Yii::$app->request->isAjax){
            $brand = Yii::$app->request->post('brand');
            $modellist = Yii::$app->request->post('carlist');
            $xbrand = [];
            array_push($xbrand, $brand);
            if(count($xbrand)>0){   
                    return $this->renderPartial("_groupcarlist",['brand'=>$xbrand,'carlist'=>$modellist]);                  
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionShowcarmodel($id){
      $model = \backend\models\Carinfo::find()->where(['brand' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {
              echo "<option value='" . $value->id . "'>$value->model</option>";

          }
      } else {
          echo "<option>-</option>";
      }
    }
}
