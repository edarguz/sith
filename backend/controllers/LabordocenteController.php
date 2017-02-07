<?php

namespace backend\controllers;

use Yii;
use backend\models\Labordocente;
use backend\models\search\LabordocenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LabordocenteController implements the CRUD actions for Labordocente model.
 */
class LabordocenteController extends Controller
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
     * Lists all Labordocente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LabordocenteSearch();
        

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
        array('total_horas_sem' => new total_horas());
    }

    /**
     * Displays a single Labordocente model.
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
     * Creates a new Labordocente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {   
    //     $model = new Labordocente();
    //     $modelsLabordocente = [new Labordocente];

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) 
    //     {
    //         return $this->redirect(['index', 'id' => $model->id_labor]);
    //     } 

    //     else {
    //         return $this->render('create', [
    //             'model' => $model,
    //             'modelsLabordocente' => (empty($modelsLabordocente)) ? [new Labordocente] : $modelsLabordocente
    //         ]);
    //          array('total_horas_sem' => new total_horas());
    //     }
    // }



    public function actionCreate()
    {
        $modelFuncionario = new Funcionario;
        $modelDatosfamiliares = [new Datosfamiliares];
        
        if ($modelFuncionario->load(Yii::$app->request->post())) {

            $modelDatosfamiliares = Model::createMultiple(Datosfamiliares::classname());
            Model::loadMultiple($modelDatosfamiliares, Yii::$app->request->post());

          

            // validate all models
            $valid = $modelFuncionario->validate();
            $valid = Model::validateMultiple($modelDatosfamiliares) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelFuncionario->save(false)) {
                        foreach ($modelDatosfamiliares as $modelAddress) {
                            $modelAddress->customer_id = $modelFuncionario->id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelFuncionario->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelFuncionario' => $modelFuncionario,
            'modelDatosfamiliares' => (empty($modelDatosfamiliares)) ? [new Datosfamiliares] : $modelDatosfamiliares
        ]);
    }





    /**
     * Updates an existing Labordocente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_labor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
             array('total_horas_sem' => new total_horas());
        }
    }

    /**
     * Deletes an existing Labordocente model.
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
     * Finds the Labordocente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Labordocente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Labordocente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
