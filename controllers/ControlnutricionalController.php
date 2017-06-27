<?php

namespace app\controllers;
use MathPHP\Statistics\Regression;
use app\models\CarnetDeVacunacion;
use app\models\Paciente;
use app\models\PacienteSearch;
use app\models\Pesohombre;
use app\models\Pesomujer;
use app\models\Tallahombre;
use app\models\Tallamujer;
use Yii;
use app\models\ControlNutricional;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
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
        $controlespaciente = ControlNutricional::find()->where(['id_paciente' => $id])->all();
        $i = 0;
        $valores = [];
        $valoresT = [];
        while ($i < 60) {
            array_push($valores, null);
            array_push($valoresT, null);

            $i++;
        }
        foreach ($controlespaciente as $item) {


            $edad = $this->calcularEdad($item->fecha, $paciente->fecha_de_nacimiento, 1);
            $valores[$edad] = $item->peso / 1000;
            $valoresT[$edad] = $item->talla;
//             array_push($valores, $item->peso / 1000);
            $i++;


        }

        $model = new ControlNutricional();

//        $model->nro_de_carnet = $carnet->nro_de_carnet;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($paciente->sexo == 'M') {

            }
            return $this->redirect(['control', 'peso' => $model->peso, 'talla' => $model->talla, 'paciente_id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model, 'valorespeso' => $valores, 'valorestalla' => $valoresT, 'sexo' => $paciente->sexo
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

    public function regresionLineal($arrayx, $arrayy)
    {
//        $Ex=array_sum($arrayx);
//        $Ey=array_sum($arrayy);
//        $Ex2=array_sum(pow($arrayx,2));
//        $EEX2=pow($Ex,2);
//        $EXY
//    Regresión Fórmula :
//
//Ecuación de Regresión ( y) = a + bx
//Pendiente(b) = (NΣXY - (ΣX)(ΣY)) / (NΣX2 - (ΣX)2)
//Interceptar(a) = (ΣY - b(ΣX)) / N
//
//Donde,
// x e y son las variables.
//    b = La Pendiente de la Recta de Regresión
//a = El Punto de Intersección de la Línea de Regresión y el eje y
//N = Número de Valores o Elementos
//X = Primero Puntuación
//Y = Segundo Puntuación
//ΣXY = Suma del Producto de Puntuaciones Primera y Segunda
//ΣX = Suma de las Primeras puntuaciones
//ΣY = Suma de Segunda Puntuaciones
//ΣX2 = Suma de Cuadrados Primeros Resultados
    }
public function actionPruebas(){
    $points = [[1,2], [2,3], [4,5], [5,7], [6,8]];

// Simple linear regression (least squares method)
    $regression = new Regression\Linear($points);
    $y          = $regression->evaluate(0.5);
//    print_r($y);exit();
}
    public function actionControl($peso, $talla, $paciente_id)
    {

        $paciente = Paciente::findOne(['id_paciente' => $paciente_id]);
        $controlespaciente = ControlNutricional::find()->where(['id_paciente' => $paciente->id_paciente])->all();
        $i = 0;
        $valores = [];
        $valoresT = [];
        while ($i < 60) {
            array_push($valores, null);
            array_push($valoresT, null);

            $i++;
        }
        foreach ($controlespaciente as $item) {


            $edad = $this->calcularEdad($item->fecha, $paciente->fecha_de_nacimiento, 1);
            $valores[$edad] = $item->peso / 1000;
            $valoresT[$edad] = $item->talla;
//             array_push($valores, $item->peso / 1000);
            $i++;


        }////////////////////////////
        ///
        ///

        $peso = $peso / 1000;
        $edad2 = $this->calcularEdad(date('Y-m-d'), $paciente->fecha_de_nacimiento, 1);
        if ($paciente->sexo == 'M') {
            $tallasestandar = Tallamujer::findOne(['mes' => $edad2]);
            $pesosestandar = Pesomujer::findOne(['mes' => $edad2]);
        } else {
            $tallasestandar = Tallahombre::findOne(['mes' => $edad2]);
            $pesosestandar = Pesohombre::findOne(['mes' => $edad2]);
        }

        if (($peso > $pesosestandar->desnutricion_moderada && $peso < $pesosestandar->sobrepeso) || ($peso == $pesosestandar->peso_normal)) {
            $diagnostico = "El paciente cuenta con un peso dentro de los rangos normales";
        } elseif ($peso <= $pesosestandar->desnutricion_critica) {
            $diagnostico = "El paciente presenta un cuadro de desnutricion critica";
        } elseif ($peso >= $pesosestandar->obesidad_critica) {
            $diagnostico = "El paciente presenta un cuadro critico de obesidad2";
        } else {
            $diagnostico = "El paciente cuenta con un peso dentro de los rangos normales";
            if ($peso >= $pesosestandar->peso_normal) {
                $diagnostico = $diagnostico . ", Pero con un cuadro tentativo de obesidad";
            } else {
                $diagnostico = $diagnostico . ", Pero con un cuadro tentativo de desnutricion";
            }
        }

        if (($talla > $tallasestandar->talla_baja && $talla < $tallasestandar->talla_alta) || ($talla == $tallasestandar->talla_normal)) {
            $diagnosticotalla = "El paciente cuenta con una talla dentro de los rangos normales";
        } elseif ($talla <= $tallasestandar->talla_baja_critica) {
            $diagnosticotalla = "El paciente presenta un cuadro de bajo crecimiento critico";
        } elseif ($talla >= $tallasestandar->talla_alta_critica) {
            $diagnosticotalla = "El paciente presenta un cuadro de crecimiento criticamente alto ";
        } else {
            $diagnosticotalla = "El paciente cuenta con una talla dentro de los rangos normales";
            if ($talla > $tallasestandar->talla_normal) {
                $diagnosticotalla = $diagnosticotalla . ", Pero con un cuadro tentativo de crecimiento alto";
            } else {
                $diagnosticotalla = $diagnosticotalla . ", Pero con un cuadro tentativo de crecimiento bajo";
            }
        }
        return $this->render('control', [
            'diagnostico' => $diagnostico, 'diagnosticotalla' => $diagnosticotalla, 'peso' => $peso, 'talla' => $talla, 'valorespeso' => $valores, 'valorestalla' => $valoresT, 'sexo' => $paciente->sexo
        ]);

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
