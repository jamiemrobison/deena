<?php

namespace backend\controllers;

use Yii;
use backend\models\Promotion;
use backend\models\PromotionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PromotionController implements the CRUD actions for Promotion model.
 */
class PromotionController extends Controller
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
     * Lists all Promotion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PromotionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promotion model.
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
     * Creates a new Promotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Promotion();

        if ($model->load(Yii::$app->request->post())) {
            $uploaded = UploadedFile::getInstance($model, 'photo');
            if(!empty($uploaded)){
                 // $upfiles = time() . "." . $uploaded->getExtension();

                    //if ($uploaded->saveAs('../uploads/products/' . $upfiles)) {
                    if ($uploaded->saveAs('../web/uploads/logo/' . $uploaded)) {
                       $model->photo = $uploaded;
                    }
            }
            $model->start_date = strtotime($model->start_date);
            $model->end_date = strtotime($model->end_date);
            if($model->save(false)){
                return $this->redirect(['index']);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Promotion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

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
            $model->start_date = strtotime($model->start_date);
            $model->end_date = strtotime($model->end_date);
            if($model->save()){
                 return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Promotion model.
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
     * Finds the Promotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promotion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
