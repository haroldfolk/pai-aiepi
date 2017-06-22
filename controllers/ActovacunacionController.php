<?php

namespace app\controllers;

use app\models\CarnetDeVacunacion;
use app\models\ControlNutricional;
use app\models\Paciente;
use app\models\Personal;
use app\models\RangoEdad;
use app\models\Vacuna;
use app\models\VacunaRango;
use Yii;
use app\models\ActoDeVacunacion;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActovacunacionController implements the CRUD actions for ActoDeVacunacion model.
 */
class ActovacunacionController extends Controller
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
     * Lists all ActoDeVacunacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ActoDeVacunacion::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ActoDeVacunacion model.
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
     * Creates a new ActoDeVacunacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActoDeVacunacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acto]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

    public function actionCreateb($idcontrol, $idpaciente)
    {
        $paciente = Paciente::findOne(['id_paciente' => $idpaciente]);
        $carnet = CarnetDeVacunacion::findOne(['id_paciente' => $idpaciente]);
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

        $paciente = Paciente::findOne(['id_paciente' => $idpaciente]);
        $edadMeses = $this->calcularEdad(date('Y-m-d'), $paciente->fecha_de_nacimiento, 1);
//        $vacunasAColocar=Vacuna::findBySql('select * from vacunas WHERE id_vacuna=(
//                                                      select id_vacuna from rango_edad where '.$edadMeses.'>=desde and '.$edadMeses.'<=hasta')->all();
//
//        print_r($edadMeses);
//        exit();
        $rangosAbarcados = RangoEdad::find()->where('desde<' . $edadMeses)->all();

        //        print_r($rangosAbarcados);
//        exit();
        $vacunasrangos = VacunaRango::find()->where(['id_rango' => $rangosAbarcados])->all();
        $vacunasverificadas = Vacuna::find()->where(['id_vacuna' => $vacunasrangos])->all();
//        print_r($vacunasverificadas);
//        exit();
        $vacunasArray = ArrayHelper::map($vacunasverificadas, 'id_vacuna', 'nombre');
        $model = new ActoDeVacunacion();
        $model->id_control = $idcontrol;
        $model->id_paciente = $idpaciente;

        $listapersonal = Personal::find()->all();
        $listapersonal = ArrayHelper::map($listapersonal, 'id_personal', 'nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acto]);
        } else {
            return $this->render('create', [
                'model' => $model, 'listapersonal' => $listapersonal, 'vacunasarray' => $vacunasArray,
                'valorespeso' => $valores, 'valorestalla' => $valoresT,'sexo'=>$paciente->sexo
            ]);
        }
    }

    /**
     * Updates an existing ActoDeVacunacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ActoDeVacunacion model.
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
     * Finds the ActoDeVacunacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActoDeVacunacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActoDeVacunacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
