<?php

namespace app\controllers;

use app\models\Dosis;
use app\models\DosisColocada;
use app\models\Paciente;
use app\models\PacienteSearch;
use app\models\User;
use Yii;
use app\models\ActoDeVacunacion;
use yii\data\ActiveDataProvider;
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $idUser = Yii::$app->getUser()->id;
        }
        $searchModel = new PacienteSearch();
        $dataProviderPaciente = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProviderPaciente' => $dataProviderPaciente, 'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single ActoDeVacunacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = new ActoDeVacunacion();
        $model->id_paciente=$id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['vacunar', 'id' => $model->id_acto]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionVacunar($id)
    {
        $acto = ActoDeVacunacion::findOne(['id_acto' => $id]);
        $paciente = Paciente::findOne(['id_paciente' => $acto->id_paciente]);
        $edad = $this->calcularEdad(date('Y-m-d'), $paciente->fecha_de_nacimiento, 1);
        $actosDelPaciente = ActoDeVacunacion::findAll(['id_paciente' =>$paciente->id_paciente]);
        $dosisActos = DosisColocada::find()->where(['id_acto' => $actosDelPaciente])->select('id_dosis')->all();
        $dosisParaPaciente = Dosis::find()->where('meses_minimo<=' . $edad. ' and meses_maximo>' . $edad )->andWhere(['not in','id_dosis',$dosisActos])->all();

//    $dosisYaColocadas=Dosis::find()->where(['id_dosis'=>$dosisActos])->all();
        $model = new DosisColocada();
        $model->id_acto=$id;
        return $this->render('vacunar', [
            'model' => $model, 'dosisParaPaciente' => $dosisParaPaciente]);
    }
public function actionConfirmarvacuna($idDosis,$idActo)
{
    $model=new DosisColocada();
    $model->id_acto=$idActo;
    $model->id_dosis=$idDosis;
    if ( $model->save()) {
        return $this->redirect(['vacunar', 'id' => $model->id_acto]);
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
     * Creates a new ActoDeVacunacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idp)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $idUser = Yii::$app->getUser()->id;
        }
        $model = new ActoDeVacunacion();
$model->id_personal=User::getIdPersonal($idUser);
$model->id_paciente=$idp;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acto]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
