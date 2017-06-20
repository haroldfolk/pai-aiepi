<?php

namespace app\controllers;

use app\models\Cargo;
use app\models\CentroDeSalud;
use Yii;
use app\models\Personal;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Personal::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
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
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personal();
        $centro = CentroDeSalud::find()->all();
        $listacentro=ArrayHelper::map($centro,'id_centro','nombre');
        $cargo = Cargo::find()->all();
        $listacargo=ArrayHelper::map($cargo,'id_cargo','nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_personal]);
        } else {
            return $this->render('create', [
                'model' => $model,'listacargo'=>$listacargo,'listacentro'=>$listacentro
            ]);
        }
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $centro = CentroDeSalud::find()->all();
        $listacentro=ArrayHelper::map($centro,'id_centro','nombre');
        $cargo = Cargo::find()->all();
        $listacargo=ArrayHelper::map($cargo,'id_cargo','nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_personal]);
        } else {
            return $this->render('update', [
                'model' => $model,'listacargo'=>$listacargo,'listacentro'=>$listacentro
            ]);
        }
    }

    /**
     * Deletes an existing Personal model.
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
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
