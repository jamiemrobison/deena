<?php

namespace backend\controllers;

use Yii;
use backend\models\Bank;
use backend\models\BankSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;

/**
 * BankController implements the CRUD actions for Bank model.
 */
class BankController extends Controller
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
     * Lists all Bank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
         $role_act = \backend\models\Userrole::checkRoleEnable("bank");
        if($role_act[0]['view'] == 1){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Creates a new Bank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bank();
        $role_act = \backend\models\Userrole::checkRoleEnable("bank");
        if($role_act[0]['create'] == 1){
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
                            ]);
                        }
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Updates an existing Bank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         $role_act = \backend\models\Userrole::checkRoleEnable("bank");
        if($role_act[0]['modified'] == 1){

                    if ($model->load(Yii::$app->request->post())) {
                        $oldlogo = Yii::$app->request->post('old_logo');
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
     * Deletes an existing Bank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         $role_act = \backend\models\Userrole::checkRoleEnable("bank");
        if($role_act[0]['delete'] == 1){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Finds the Bank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
