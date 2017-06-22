<?php

namespace app\controllers;

use app\models\CarnetDeVacunacion;
use app\models\Paciente;
use app\models\PacienteSearch;
use Yii;
use app\models\ControlNutricional;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ControlnutricionalController implements the CRUD actions for ControlNutricional model.
 */
class ControlnutricionalController extends Controller
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
     * Lists all ControlNutricional models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ControlNutricional::find(),
        ]);
        $searchModel = new PacienteSearch();
        $dataProviderPaciente = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider, 'dataProviderPaciente' => $dataProviderPaciente, 'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ControlNutricional model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $paciente = Paciente::findOne(['id_paciente' => $id]);
        $carnet = CarnetDeVacunacion::findOne(['id_paciente' => $id]);
        $controlespaciente = ControlNutricional::find()->where(['nro_de_carnet' => $carnet->nro_de_carnet])->all();
        $i = 0;
        $valores = [];
        $valoresT=[];
        while ($i < 60) {
            array_push($valores, null);
            array_push($valoresT, null);

            $i++;
        }
        foreach ($controlespaciente as $item) {


            $edad = $this->calcularEdad($item->fecha, $paciente->fecha_de_nacimiento, 1);
            $valores[$edad] = $item->peso / 1000;
            $valoresT[$edad] = $item->talla ;
//             array_push($valores, $item->peso / 1000);
            $i++;


        }

        $model = new ControlNutricional();

        $model->nro_de_carnet = $carnet->nro_de_carnet;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['actovacunacion/createb', 'idcontrol' => $model->id_control, 'idpaciente' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'valorespeso' => $valores, 'valorestalla' => $valoresT,'sexo'=>$paciente->sexo
            ]);
        }
    }

    public function calcularEdad($fechahoy, $fechanac, $b = 0)
    {

//    $date2 = date('Y-m-d');//la fecha del computador
        $diff = abs(strtotime($fechahoy) - strtotime($fechanac));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        if ($b == 0) return $years;
        elseif ($b == 1) return $years * 12 + $months;
        elseif ($b == 2) return ($years * 12 + $months) * 30 + $days;
    }

    /**
     * Creates a new ControlNutricional model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ControlNutricional();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_control]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ControlNutricional model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_control]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ControlNutricional model.
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
     * Finds the ControlNutricional model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ControlNutricional the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ControlNutricional::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
