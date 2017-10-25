<?php

namespace backend\controllers;

use Yii;
use backend\models\Userrole;
use backend\models\UserroleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Menu;
use backend\models\Permission;
/**
 * UserroleController implements the CRUD actions for Userrole model.
 */
class UserroleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        }
    }
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
     * Lists all Userrole models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserroleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userrole model.
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
     * Creates a new Userrole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userrole();
        $listmenu =  Menu::find()->all();
        if ($model->load(Yii::$app->request->post())) {
            $menuid = Yii::$app->request->post('menuid');
            $is_full = Yii::$app->request->post('is_full');
            $is_view = Yii::$app->request->post('is_view');
            $is_modified = Yii::$app->request->post('is_modified');
            $is_delete = Yii::$app->request->post('is_delete');
            $is_approve = Yii::$app->request->post('is_approve');

            if( $model->save()){
                if(count($menuid)>0){
                    for($i=0;$i<=count($menuid)-1;$i++){
                        $model_per = new Permission();
                        $model_per->role_id = $model->id;
                        $model_per->menu_id = $menuid[$i];
                        $model_per->is_full = $is_full[$i];
                        $model_per->is_view = $is_view[$i];
                        $model_per->is_update = $is_modified[$i];
                        $model_per->is_delete = $is_delete[$i];
                        $model_per->is_approve = $is_approve[$i];
                        $model_per->save(false);
                        
                    }
                }
              return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'listmenu' => $listmenu,
            ]);
        }
    }

    /**
     * Updates an existing Userrole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listmenu =Menu::find()->orderBy(['id'=>SORT_ASC])->all();
        $listmenu_select = Permission::find()->where(['role_id'=>$id])->orderBy(['id'=>SORT_ASC])->all();
        if ($model->load(Yii::$app->request->post())) {

            $menuid = Yii::$app->request->post('menuid');
            $is_full = Yii::$app->request->post('is_full');
            $is_view = Yii::$app->request->post('is_view');
            $is_modified = Yii::$app->request->post('is_modified');
            $is_delete = Yii::$app->request->post('is_delete');
            $is_approve = Yii::$app->request->post('is_approve');

          //  echo $id;
            //echo count($is_full);
            // return;

            
            if($model->save(false)){

                 if(count($menuid)>0){

                    for($i=0;$i<=count($menuid)-1;$i++){
                         $model_per = Permission::find()->where(['menu_id'=>$menuid[$i],'role_id'=>$id])->one();
                         if($model_per){
                       //       //echo $is_full[$i];return;
                       // // $model_per->role_id = $model->id;
                       // // $model_per->menu_id = $menuid[$i];
                        $model_per->is_full = $is_full[$i];
                        $model_per->is_view = $is_view[$i];
                        $model_per->is_update = $is_modified[$i];
                        $model_per->is_delete = $is_delete[$i];
                        $model_per->is_approve = $is_approve[$i];
                        $model_per->save(false);
                         }
                         
                        
                    }
                }
             
              return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'listmenu' => $listmenu,
                'listmenu_select'=>$listmenu_select,
            ]);
        }
    }

    /**
     * Deletes an existing Userrole model.
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
     * Finds the Userrole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userrole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userrole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
