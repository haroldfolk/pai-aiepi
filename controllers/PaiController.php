<?php

namespace app\controllers;


use app\models\ActoDeVacunacion;
use app\models\Dosis;
use app\models\DosisColocada;
use app\models\Paciente;
use app\models\PaiForm;
use MathPHP\Statistics\Regression\Linear;
use MathPHP\Statistics\Regression\LinearThroughPoint;
use MathPHP\Statistics\Regression\LineweaverBurk;
use MathPHP\Statistics\Regression\PowerLaw;
use MathPHP\Statistics\Regression\Regression;
use MathPHP\Statistics\Regression\TheilSen;
use Yii;
use yii\data\ActiveDataProvider;

class PaiController extends \yii\web\Controller
{
    public function actionForm()
    {
        $model = new  PaiForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $dosisEntrefechas = ActoDeVacunacion::find()->where('fecha>=' . $model->fechainicio . ' and fecha<=' . $model->fechafin)->select('id_acto');
                $fechaIniCopia = ($model->fechainicio);
                $calcularDias = $this->calcularEdad($model->fechafin, $model->fechainicio, 2);
                $valoresReales = [];
                $fechas = [];
                $valoresPronosticados = [];
                $puntosParaRegresion = [];
                $i = 0;
                while ($calcularDias >= 0) {
                    $calcularDias--;
                    $nuevafecha = strtotime('+1 day', strtotime($fechaIniCopia));
                    $nuevafecha = date('Y-m-d', $nuevafecha);
                    if ($nuevafecha > date('Y-m-d')) {
                        $regression = new Linear($puntosParaRegresion);
                        array_push($valoresPronosticados, round($regression->evaluate($i), 1));
                    } else {
                        $actosDeFecha = ActoDeVacunacion::find()->where(['fecha' => $nuevafecha])->all();
                        $dosisTotalesDelDia = DosisColocada::find()->where(['id_acto' => $actosDeFecha, 'id_dosis' => $model->dosis])->count();
//                        $dosisTotalesDelDia = $dosisTotalesDelDia;
                        $dosisTotalesDelDia = $dosisTotalesDelDia + rand(0, 20);
                        $nuevoPunto = [$i, end($valoresReales) + $dosisTotalesDelDia];
                        array_push($puntosParaRegresion, $nuevoPunto);
                        array_push($valoresPronosticados, null);
                        array_push($valoresReales, end($valoresReales) + $dosisTotalesDelDia);
                    }
                    array_push($fechas, $fechaIniCopia);
                    $fechaIniCopia = $nuevafecha;
                    $i++;
                }
                $dosisSum = DosisColocada::find()->where(['id_acto' => $dosisEntrefechas]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $dosisSum,
                ]);
                return $this->render('view', ['dataProvider' => $dataProvider, 'fechas' => $fechas, 'valoresR' => $valoresReales, 'valoresP' => $valoresPronosticados]);
            }
        };

        return $this->render('form', [
            'model' => $model,
        ]);
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

    public function actionGenerar()
    {
        return $this->render('generar');
    }

    public function actionIndex()
    {

        return $this->redirect(['form']);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
