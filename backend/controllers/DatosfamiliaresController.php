<?php

namespace backend\controllers;

use Yii;
use backend\models\Datosfamiliares;
use backend\models\search\DatosfamiliaresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatosfamiliaresController implements the CRUD actions for Datosfamiliares model.
 */
class DatosfamiliaresController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Datosfamiliares models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatosfamiliaresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Datosfamiliares model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Datosfamiliares model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Datosfamiliares();
        $modelsDatosfamiliares = [new Datosfamiliares];
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            return $this->redirect(['view', 'id' => $model->id_datos_fam]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'modelsDatosfamiliares' => (empty($modelsDatosfamiliares)) ? [new Datosacademicos] : $modelsDatosfamiliares
            ]);
        }
    }

    /**
     * Updates an existing Datosfamiliares model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_datos_fam]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Datosfamiliares model.
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
     * Finds the Datosfamiliares model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Datosfamiliares the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Datosfamiliares::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
