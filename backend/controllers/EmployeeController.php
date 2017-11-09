<?php

namespace backend\controllers;

use Yii;
use backend\models\Employee;
use backend\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;


/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $role_act = \backend\models\Userrole::checkRoleEnable("employee");
        if($role_act[0]['view'] == 1){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        $role_act = \backend\models\Userrole::checkRoleEnable("employee");
        if($role_act[0]['create'] == 1){
                if ($model->load(Yii::$app->request->post())) {
                    $oldlogo = Yii::$app->request->post('old_photo');
                    $uploaded = UploadedFile::getInstance($model, 'photo');
                    if(!empty($uploaded)){
                          $upfiles = time() . "." . $uploaded->getExtension();

                            //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                            if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                               $model->photo = $upfiles;
                            }
                    }else{
                        $model->photo = $oldlogo;
                    }
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
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $role_act = \backend\models\Userrole::checkRoleEnable("employee");
        if($role_act[0]['modified'] == 1){
                if ($model->load(Yii::$app->request->post())) {
                    $oldlogo = Yii::$app->request->post('old_photo');
                    $uploaded = UploadedFile::getInstance($model, 'photo');
                    if(!empty($uploaded)){
                          $upfiles = time() . "." . $uploaded->getExtension();

                            //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                            if ($uploaded->saveAs('../web/uploads/logo/' . $upfiles)) {
                               $model->photo = $upfiles;
                            }
                    }else{
                         $model->photo = $oldlogo;
                    }
                    if($model->save()){
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
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         $role_act = \backend\models\Userrole::checkRoleEnable("employee");
        if($role_act[0]['delete'] == 1){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
