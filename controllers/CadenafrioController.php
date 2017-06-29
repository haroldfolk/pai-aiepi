<?php

namespace app\controllers;

use app\models\CentroDeSalud;
use app\models\Personal;
use app\models\Refrigerador;
use app\models\User;
use app\models\Usuario;
use Yii;
use app\models\CadenaDeFrio;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CadenafrioController implements the CRUD actions for CadenaDeFrio model.
 */
class CadenafrioController extends Controller
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
     * Lists all CadenaDeFrio models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['create']);
//        $dataProvider = new ActiveDataProvider([
//            'query' => CadenaDeFrio::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Displays a single CadenaDeFrio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->temperatura < 2) {
            $mensaje = 'Las vacunas corren peligro por temperatura baja. Notifique a su supervisor';

        } elseif ($model->temperatura > 8) {

            $mensaje = 'Las vacunas corren peligro por temperatura alta. Notifique a su supervisor';
        } else {

            $mensaje = "Temperatura dentro del rango de temperatura normal";
        }
        return $this->render('view', [
            'model' => $model, 'mensaje' => $mensaje

        ]);
    }

    /**
     * Creates a new CadenaDeFrio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $idUser = Yii::$app->getUser()->id;
            $personal = Personal::find()->where(['id_personal' => Usuario::findOne(['id' => $idUser])->id_personal])->all();
            $listap = ArrayHelper::map($personal, 'id_personal', 'nombre');

        }
        $model = new CadenaDeFrio();
        $centro = CentroDeSalud::findOne(['id_centro' => Personal::findOne(['id_personal' => User::getIdPersonal($idUser)])]);
        $refrigerador = Refrigerador::find()->where(['id_centro' => $centro->id_centro])->all();
        $listar = ArrayHelper::map($refrigerador, 'id_refrigerador', 'modelo');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nro_control]);
        } else {
            return $this->render('create', [
                'model' => $model, 'listar' => $listar, 'listap' => $listap
            ]);
        }
    }

    /**
     * Updates an existing CadenaDeFrio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->nro_control]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CadenaDeFrio model.
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
     * Finds the CadenaDeFrio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CadenaDeFrio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CadenaDeFrio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
