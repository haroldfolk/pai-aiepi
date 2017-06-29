<?php

namespace app\controllers;

use app\models\ControlNutricional;
use app\models\Paciente;
use app\models\Pesohombre;
use app\models\Pesomujer;
use app\models\Tallahombre;
use app\models\Tallamujer;
use app\models\Vistaprobando;
use app\models\AiepiForm;
use Yii;
use yii\data\ActiveDataProvider;

class AiepiController extends \yii\web\Controller
{
    public function actionGenerar()
    {

        return $this->render('generar');
    }

    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Vistaprobando::find(),
//        ]);
//        return $this->render('index', ['dataProvider' => $dataProvider]);
        return $this->redirect(['form']);
    }

    public function actionView()
    {
        return $this->render('view');
    }


    public function actionForm()
    {
        $Ob = 0;
        $SO = 0;
        $NO = 0;
        $DM = 0;
        $DC = 0;
        //Tallas
        $TB = 0;
        $TN = 0;
        $model = new AiepiForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $controles = ControlNutricional::find()->where('fecha>=' . $model->fechainicio . ' and fecha<=' . $model->fechafin)->all();
                foreach ($controles as $control) {
                    $paciente = Paciente::find()->where(['id_paciente' => $control->id_paciente])->one();
                    $edadPaciente = $this->calcularEdad($control->fecha, $paciente->fecha_de_nacimiento, 1);
                    if ($paciente->sexo == 'M') {
                        $tallasestandar = Tallamujer::findOne(['mes' => $edadPaciente]);
                        $pesosestandar = Pesomujer::findOne(['mes' => $edadPaciente]);
                    } else {
                        $tallasestandar = Tallahombre::findOne(['mes' => $edadPaciente]);
                        $pesosestandar = Pesohombre::findOne(['mes' => $edadPaciente]);
                    }
                    $control->peso = $control->peso / 1000;
                    if ($edadPaciente >= $model->edadinicio && $edadPaciente < $model->edadfin) {
                        if (($control->peso > $pesosestandar->desnutricion_moderada && $control->peso < $pesosestandar->sobrepeso) || ($control->peso == $pesosestandar->peso_normal)) {
                            $NO++;
//                       $diagnostico = "El paciente cuenta con un peso dentro de los rangos normales";
                        } elseif ($control->peso <= $pesosestandar->desnutricion_critica) {
                            $DC++;
//                            $diagnostico = "El paciente presenta un cuadro de desnutricion critica";
                        } elseif ($control->peso >= $pesosestandar->obesidad_critica) {
                            $Ob++;
                            $diagnostico = "El paciente presenta un cuadro critico de obesidad2";
                        } else {
//                            $diagnostico = "El paciente cuenta con un peso dentro de los rangos normales";
                            if ($control->peso >= $pesosestandar->peso_normal) {
                                $SO++;
//                                $diagnostico = $diagnostico . ", Pero con un cuadro tentativo de obesidad";
                            } else {
                                $DM++;
//                                $diagnostico = $diagnostico . ", Pero con un cuadro tentativo de desnutricion";
                            }
                        }

                        if (($control->talla > $tallasestandar->talla_baja && $control->talla < $tallasestandar->talla_alta) || ($control->talla == $tallasestandar->talla_normal)) {
                            $TN++;
//                            $diagnosticotalla = "El paciente cuenta con una talla dentro de los rangos normales";
                        } elseif ($control->talla <= $tallasestandar->talla_baja_critica) {
                            $TB++;
//                      $diagnosticotalla = "El paciente presenta un cuadro de bajo crecimiento critico";
                        } elseif ($control->talla >= $tallasestandar->talla_alta_critica) {
                            $TN++;
//                            $diagnosticotalla = "El paciente presenta un cuadro de crecimiento criticamente alto ";
                        } else {
                            $TN++;
//                            $diagnosticotalla = "El paciente cuenta con una talla dentro de los rangos normales";
                            if ($control->talla > $tallasestandar->talla_normal) {
//                                $diagnosticotalla = $diagnosticotalla . ", Pero con un cuadro tentativo de crecimiento alto";
                            } else {
//                                $diagnosticotalla = $diagnosticotalla . ", Pero con un cuadro tentativo de crecimiento bajo";
                            }
                        }
                    }
                }
            }
        return $this->render('view',['model'=>$model,'OB'=>$Ob,'SO'=>$SO,'NO'=>$NO,'DM'=>$DM,'DC'=>$DC,'TN'=>$TN,'TB'=>$TB]);
        }

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
}
