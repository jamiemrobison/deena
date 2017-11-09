<?php

namespace backend\controllers;

use Yii;
use backend\models\Productprice;
use backend\models\ProductpriceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Package;
use yii\web\ForbiddenHttpException;
/**
 * ProductpriceController implements the CRUD actions for Productprice model.
 */
class ProductpriceController extends Controller
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
     * Lists all Productprice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductpriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productprice model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $role_act = \backend\models\Userrole::checkRoleEnable("productprice");
        if($role_act[0]['view'] == 1){
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Creates a new Productprice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productprice();
        $role_act = \backend\models\Userrole::checkRoleEnable("productprice");
        if($role_act[0]['create'] == 1){

                if ($model->load(Yii::$app->request->post())) {
                    $model->amount_start = str_replace(',', '', $model->amount_start);
                    $model->amount_end = str_replace(',', '', $model->amount_end);
                    $model->total = str_replace(',', '', $model->total);
                    $model->alltotal = str_replace(',', '', $model->alltotal);
                    $model->score = str_replace(',', '', $model->score);
                    if($model->save()){
                        return $this->redirect(['update', 'id' => $model->id]);
                    }
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Updates an existing Productprice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $role_act = \backend\models\Userrole::checkRoleEnable("productprice");
        if($role_act[0]['modified'] == 1){

                if ($model->load(Yii::$app->request->post())) {
                  //  echo str_replace(',', '', $model->score);
                    $model->amount_start = str_replace(',', '', $model->amount_start);
                    $model->amount_end = str_replace(',', '', $model->amount_end);
                    $model->total = str_replace(',', '', $model->total);
                    $model->alltotal = str_replace(',', '', $model->alltotal);
                    $model->score = str_replace(',', '', $model->score);
                    if($model->save(false)){
                        return $this->redirect(['update', 'id' => $model->id]);
                    }
                } else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Deletes an existing Productprice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $role_act = \backend\models\Userrole::checkRoleEnable("productprice");
        if($role_act[0]['delete'] == 1){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Finds the Productprice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productprice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productprice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGetscorerate($id){
        if(Yii::$app->request->isPost){
            $model = Package::find()->where(['id'=>$id])->one();
            if($model){
                return $model->score_rate;
            }else{
                return 0;
            }
        }
    }
}
