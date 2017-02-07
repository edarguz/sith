<?php

namespace backend\controllers;

use Yii;
use backend\models\Fondosalud;
use backend\models\search\FondosaludSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;
/**
 * FondosaludController implements the CRUD actions for Fondosalud model.
 */
class FondosaludController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
               'class' => AccessControl::className(),
               'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],



            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Fondosalud models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FondosaludSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fondosalud model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    // public function actionCreate()
    // {
    //     $model = new Fondosalud();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id_fondo_salud]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

     public function actionCreate($submit = false)
    {
        $model = new Fondosalud();
     
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
     
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->refresh();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return 
                    $this->redirect(['index', 'id' => $model->id_fondo_salud]);
               
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }
     
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Area model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id, $submit = false)
    {
        $model = $this->findModel($id);
     
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
     
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->refresh();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return 
                     $this->redirect(['index', 'id'=>$model->id_fondo_salud]);
               
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }
     
        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }


    /**
     * Creates a new Fondosalud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
   

    /**
     * Deletes an existing Fondosalud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fondosalud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Fondosalud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fondosalud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
