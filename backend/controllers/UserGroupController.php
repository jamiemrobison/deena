<?php

namespace backend\controllers;

use Yii;
use backend\models\Usergroup;
use backend\models\UserGroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Userrole;
use yii\web\ForbiddenHttpException;

/**
 * UserGroupController implements the CRUD actions for UserGroup model.
 */
class UsergroupController extends Controller
{
    public $role_act;
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
    public function init(){
        $user_roleid = Yii::$app->user->identity->role_id;
        $role_act = Userrole::checkRoleEnable($user_roleid,8);
    }

    /**
     * Lists all UserGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        

       // print_r($role_act);

        $searchModel = new UserGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserGroup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $user_roleid = Yii::$app->user->identity->role_id;
        $role_act = Userrole::checkRoleEnable($user_roleid,8);
        if($role_act[0]['view'] == 1){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Creates a new UserGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usergroup();
        $role_act = Userrole::checkRoleEnable("usergroup");
       // echo $role_act;return;
       // print_r($role_act);return;
        if($role_act[0]['create'] == 1){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
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
     * Updates an existing UserGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $role_act = Userrole::checkRoleEnable("usergroup");
        //print_r($role_act);return;
        if($role_act[0]['modified'] == 1){
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
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
     * Deletes an existing UserGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $role_act = Userrole::checkRoleEnable("usergroup");
        if($role_act[0]['delete'] == 1){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
        }
    }

    /**
     * Finds the UserGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usergroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
