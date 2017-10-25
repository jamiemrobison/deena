<?php

namespace backend\controllers;

use Yii;
use backend\models\Package;
use backend\models\PackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Packagedetail;
use backend\helpers\ProtectType;
use backend\models\Packagecondition;
use backend\models\Packagepromotion;
use common\models\VCompanyCom;
/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
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
     * Lists all Package models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Package model.
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
     * Creates a new Package model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Package();
        $model_protect = new Packagedetail();
        $model_condition = new Packagecondition();
        $model_promotion = Packagepromotion::find()->all();
        $model_company_com = VCompanyCom::find()->all();
        $model_package = Package::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $list = isset($_POST['carlistbox']) ? $_POST['carlistbox'] : '';
           
            $protectid = Yii::$app->request->post('protectid');
            $actprotectid = Yii::$app->request->post('actprotectid');
            $desc = Yii::$app->request->post('description');
            $amount = Yii::$app->request->post('amount');

            $conditionid = Yii::$app->request->post('conditionid');
            $desc_condition = Yii::$app->request->post('desc_condition');
            $condition_text = Yii::$app->request->post('condition_text');
            $yesno = Yii::$app->request->post('yesno');
            //echo $protectid[0];return;

            $model->start_date = strtotime($model->start_date);
            $model->end_date = strtotime($model->end_date);
            if($model->save()){   
                if(count($protectid)>0){
                    for($i=0;$i <= count($protectid)-1;$i++){
                        $model_protect = new Packagedetail();
                        $model_protect->package_id = $model->id;
                         $model_protect->actprotect_id = $actprotectid[$i];
                        $model_protect->coverage_type = $protectid[$i];
                        $model_protect->converage_detail = $desc[$i];
                        $model_protect->amount = $amount[$i];
                        $model_protect->status = 1;
                        $model_protect->save();
                 
                    }
                    
                }
                if(count($conditionid)>0){
                    for($i=0;$i <= count($conditionid)-1;$i++){
                        $model_condition = new Packagecondition();
                        $model_condition->package_id = $model->id;
                        $model_condition->title_id = $conditionid[$i];
                        $model_condition->condition_text = $desc_condition[$i];
                        $model_condition->status = 1;
                        $model_condition->save();
                 
                    }
                    
                }
                 if(count($list)>0){
                    for($i=0;$i<=count($list)-1;$i++){
                        $model_pacakage_car = new \common\models\PackageCar();
                        $model_pacakage_car->package_id = $model->id;
                        $model_pacakage_car->car_id = $list[$i];
                        $model_pacakage_car->description = '';
                        $model_pacakage_car->status = 1;
                        $model_pacakage_car->save();

                    }
                }
                return $this->redirect(['update', 'id' => $model->id]); 
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_protect' => $model_protect,
                'model_condition' => $model_condition,
                'model_company_com' => $model_company_com,
                'model_package'=>$model_package,
                'model_promotion'=>$model_promotion,
            ]);
        }
    }

    /**
     * Updates an existing Package model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_protect = new Packagedetail();
        $model_condition = new Packagecondition();
        $model_protect_detail = Packagedetail::find()->where(['package_id'=>$id])->all();
        $model_condition_detail = Packagecondition::find()->where(['package_id'=>$id])->all();
        $model_car_select = \common\models\PackageCar::find()->where(['package_id'=>$id])->all();
        $model_company_com = VCompanyCom::find()->all();
        $model_package = Package::find()->all();
        $model_promotion = \backend\models\Promotion::find()->all();
        $model_promotion_data = Packagepromotion::find()->where(['package_id'=>$id])->all();


        if ($model->load(Yii::$app->request->post())) {
            
            $list = isset($_POST['carlistbox']) ? $_POST['carlistbox'] : '';
           
            $protectid = Yii::$app->request->post('protectid');
            $actprotectid = Yii::$app->request->post('actprotectid');
            $desc = Yii::$app->request->post('description');
            $amount = Yii::$app->request->post('amount');
          
            $promotionid = Yii::$app->request->post('promot_id');
            
            //print_r($amount);return;

             $conditionid = Yii::$app->request->post('conditionid');
            $desc_condition = Yii::$app->request->post('desc_condition');
            $condition_text = Yii::$app->request->post('condition_text');
            $yesno = Yii::$app->request->post('yesno');
           // echo count($desc_condition);return;
            $model->start_date = strtotime($model->start_date);
            $model->end_date = strtotime($model->end_date);
            if($model->save()){   
                if(count($protectid)>0){
                    Packagedetail::deleteAll(['package_id'=>$id]);
                    for($i=0;$i <= count($protectid)-1;$i++){
                        $model_protect = new Packagedetail();
                        $model_protect->package_id = $model->id;
                        $model_protect->coverage_type = $protectid[$i];
                        $model_protect->converage_detail = $desc[$i];
                        $model_protect->amount = $amount[$i];
                        $model_protect->actprotect_id = $actprotectid[$i];
                        $model_protect->status = 1;
                        $model_protect->save();
                 
                    }
                    
                }else{
                    Packagedetail::deleteAll(['package_id'=>$id]);
                }
                if(count($conditionid)>0){
                      Packagecondition::deleteAll(['package_id'=>$id]);
                    for($i=0;$i <= count($conditionid)-1;$i++){
                        $model_condition = new Packagecondition();
                        $model_condition->package_id = $model->id;
                        $model_condition->title_id = $conditionid[$i];
                        $model_condition->condition_text = $desc_condition[$i];
                        $model_condition->status = 1;
                        $model_condition->save();
                 
                    }
                    
                }else{
                    Packagecondition::deleteAll(['package_id'=>$id]);
                }
                if(count($list)>0){
                    for($i=0;$i<=count($list)-1;$i++){
                        $model_pacakage_car = new \common\models\PackageCar();
                        $model_pacakage_car->package_id = $model->id;
                        $model_pacakage_car->car_id = $list[$i];
                        $model_pacakage_car->description = '';
                        $model_pacakage_car->status = 1;
                        $model_pacakage_car->save();

                    }
                }
                if(count($promotionid)>0){
                    Packagepromotion::deleteAll(['package_id'=>$id]);
                    for($i=0;$i<=count($promotionid)-1;$i++){
                        $model_promot = new \backend\models\Packagepromotion();
                        $model_promot->package_id = $model->id;
                        $model_promot->promotion_id = $promotionid[$i];
                        $model_promot->description = '';
                        $model_promot->status = 1;
                        $model_promot->save(false);

                    }
                }
                return $this->redirect(['update', 'id' => $model->id]); 
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_protect' => $model_protect,
                'model_condition' => $model_condition,
                'model_protect_detail' => $model_protect_detail,
                'model_condition_detail' => $model_condition_detail,
                'model_car_select' => $model_car_select,
                'model_company_com' => $model_company_com,
                'model_package'=>$model_package,
                'model_promotion'=>$model_promotion,
                'model_promotion_data'=>$model_promotion_data,
            ]);
        }
    }

    /**
     * Deletes an existing Package model.
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
     * Finds the Package model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Package the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Package::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     public function actionAddprotect(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $txt = Yii::$app->request->post('txt');
            $desc = Yii::$app->request->post('desc');
            $amt = Yii::$app->request->post('amt');
            $desc_txt = Yii::$app->request->post('desc_txt');
            
            if($id){
                $data = [];
                $data['id'] = $id;
                $data['protect'] = $txt;
                $data['description'] = $desc;
                $data['description_txt'] = $desc_txt;
                $data['amount'] = $amt;

                return $this->renderPartial("_addprotect",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionAddcondition(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $txt = Yii::$app->request->post('txt');
            $desc = Yii::$app->request->post('desc');
            $yesno = Yii::$app->request->post('yesno');

            //return $id;
            if($id){
               // return $desc;
                $data = [];
                $data['id'] = $id;
                $data['condition'] = $txt;
                $data['yesno'] = $yesno;
                $data['desc_condition'] = $desc;
                $data['condition_text'] = $desc;

                return $this->renderPartial("_addcondition",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionAddpromotion(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            //return $id;
            if(count($id) > 0){
               // return $desc;
                 $data = \backend\models\Promotion::find()->where(['id'=>$id])->all();
                return $this->renderPartial("_addpromotion",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
    public function actionShowactprotect($id){
      $model = \common\models\Actprotect::find()->where(['protect_id' => $id])->all();

      if (count($model) > 0) {
          foreach ($model as $value) {

              echo "<option value='" . $value->id . "'>$value->name</option>";

          }
      } else {
          echo "<option>-</option>";
      }
    }
    public function actionRemovepromotion(){
        if(Yii::$app->request->isAjax){
             $packid = Yii::$app->request->post('packid');
             $id = Yii::$app->request->post('id');
           //  return $id;
             if($packid){
                $x = Packagepromotion::find()->where(['package_id'=>$packid,'promotion_id'=>$id])->one();
              //   return count($x);
                if($x){

                  if($x->delete()){
                    return 1;
                  }
                }else{
                    return;
                }
             }
        }
    }
    public function actionCopyprotect(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->request->post('id');
            $type = Yii::$app->request->post('type');

            if($type ==1){ //ความคุ้มครอง
                 $model = \backend\models\Packagedetail::find()->where(['package_id'=>$id])->all();
                    if(count($model)>0){
                    //    return count($model);
                      //  $data = [];
                      //  foreach ($model as $value) {
                       //     array_push($data,['id'=>$value->id,'coverage_type'=>$value->coverage_type,'protect'=>$value->actprotect_id,'amount'=>$value->amount]);
                       // }
                      // return count($model);
                        return $this->renderPartial("_copyprotect",['data'=>$model]);
                    }else{
                        return;
                    }
            }else{
                $model = \backend\models\Packagecondition::find()->where(['package_id'=>$id])->all();
                    if(count($model)>0){
                      // return count($model);
                      //  $data = [];
                      //  foreach ($model as $value) {
                       //     array_push($data,['id'=>$value->id,'coverage_type'=>$value->coverage_type,'protect'=>$value->actprotect_id,'amount'=>$value->amount]);
                       // }
                      // return count($model);
                        return $this->renderPartial("_copycondition",['data'=>$model]);
                    }else{
                        return;
                    }
            }
           
        }
       // $data = Yii::$app->request->post("data");
        
    }
}
