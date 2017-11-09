<?php

namespace backend\controllers;

use Yii;
use backend\models\Act;
use backend\models\ActSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ActController implements the CRUD actions for Act model.
 */
class ActController extends Controller
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
     * Lists all Act models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Act model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $role_act = \backend\models\Userrole::checkRoleEnable("act");
        if($role_act[0]['view'] == 1){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Creates a new Act model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Act();
        $role_act = \backend\models\Userrole::checkRoleEnable("act");
        if($role_act[0]['create'] == 1){
                if ($model->load(Yii::$app->request->post())) {
                    $model->all_premium = str_replace(',', '', $model->all_premium);
                     $model->tax_premium = str_replace(',', '', $model->tax_premium);
                    $model->protect_amount = str_replace(',', '', $model->protect_amount);
                 
                    if($model->save(false)){
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
     * Updates an existing Act model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $role_act = \backend\models\Userrole::checkRoleEnable("act");
        if($role_act[0]['modified'] == 1){
                if ($model->load(Yii::$app->request->post())) {
                     $model->all_premium = str_replace(',', '', $model->all_premium);
                     $model->tax_premium = str_replace(',', '', $model->tax_premium);
                    $model->protect_amount = str_replace(',', '', $model->protect_amount);
                 
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
     * Deletes an existing Act model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $role_act = \backend\models\Userrole::checkRoleEnable("act");
        if($role_act[0]['delete'] == 1){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Finds the Act model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Act the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Act::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
