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

        if ($model->load(Yii::$app->request->post())) {
            $protectid = Yii::$app->request->post('protectid');
            $desc = Yii::$app->request->post('description');
            $amount = Yii::$app->request->post('amount');

            $conditionid = Yii::$app->request->post('conditionid');
            $desc_condition = Yii::$app->request->post('desc_condition');
            $condition_text = Yii::$app->request->post('condition_text');
            //echo $protectid[0];return;

            $model->start_date = strtotime($model->start_date);
            $model->end_date = strtotime($model->end_date);
            if($model->save()){   
                if(count($protectid)>0){
                    for($i=0;$i <= count($protectid)-1;$i++){
                        $model_protect = new Packagedetail();
                        $model_protect->package_id = $model->id;
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
                return $this->redirect(['update', 'id' => $model->id]); 
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_protect' => $model_protect,
                'model_condition' => $model_condition,
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
        if ($model->load(Yii::$app->request->post())) {
            
            $protectid = Yii::$app->request->post('protectid');
            $desc = Yii::$app->request->post('description');
            $amount = Yii::$app->request->post('amount');

             $conditionid = Yii::$app->request->post('conditionid');
            $desc_condition = Yii::$app->request->post('desc_condition');
            $condition_text = Yii::$app->request->post('condition_text');
            //echo $protectid[0];return;
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
                return $this->redirect(['update', 'id' => $model->id]); 
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_protect' => $model_protect,
                'model_condition' => $model_condition,
                'model_protect_detail' => $model_protect_detail,
                'model_condition_detail' => $model_condition_detail,
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
            
            if($id){
                $data = [];
                $data['id'] = $id;
                $data['protect'] = $txt;
                $data['description'] = $desc;
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
            //return $id;
            if($id){
               // return $desc;
                $data = [];
                $data['id'] = $id;
                $data['condition'] = $txt;
                $data['desc_condition'] = $desc;
                $data['condition_text'] = $desc;

                return $this->renderPartial("_addcondition",['data'=>$data]);
            }else{
                return;
            }
        }
       // $data = Yii::$app->request->post("data");
        
    }
}
