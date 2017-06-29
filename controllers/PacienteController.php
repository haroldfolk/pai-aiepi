<?php

namespace app\controllers;

use app\models\CarnetDeVacunacion;
use app\models\CentroDeSalud;
use app\models\Personal;
use app\models\User;
use app\models\Usuario;
use Yii;
use app\models\Paciente;
use app\models\PacienteSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PacienteController implements the CRUD actions for Paciente model.
 */
class PacienteController extends Controller
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
     * Lists all Paciente models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $idUser = Yii::$app->getUser()->id;
        }
        $searchModel = new PacienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paciente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $carnet=CarnetDeVacunacion::findOne(['id_paciente'=>$id]);
        return $this->render('view', [
            'model' => $this->findModel($id),'carnet'=>$carnet->nro_de_carnet
        ]);
    }

    /**
     * Creates a new Paciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $idUser = Yii::$app->getUser()->id;
        }

        $centro = CentroDeSalud::findAll(['id_centro' => Personal::findOne(['id_personal' => User::getIdPersonal($idUser)])]);
        $model = new Paciente();
//        $centro = CentroDeSalud::find()->where(['id_centro'=>$personal->id_centro])->all();
        $listacentro=ArrayHelper::map($centro,'id_centro','nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $carnet=new CarnetDeVacunacion();
            $carnet->id_paciente=$model->id_paciente;
            $carnet->fecha_de_expedicion=date('Y-m-d');
            $carnet->procedencia=$model->id_centro;
            $carnet->nro_de_carnet=time();
            $carnet->save();
            return $this->redirect(['view', 'id' => $model->id_paciente]);
        } else {
            return $this->render('create', [
                'model' => $model,'listacentro'=>$listacentro
            ]);
        }
    }
    /**
     * Updates an existing Paciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $centro = CentroDeSalud::find()->all();
        $listacentro=ArrayHelper::map($centro,'id_centro','nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_paciente]);
        } else {
            return $this->render('update', [
                'model' => $model,'listacentro'=>$listacentro
            ]);
        }
    }

    /**
     * Deletes an existing Paciente model.
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
     * Finds the Paciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
