<?php

namespace admin\controllers;

use admin\models\AkreditasiProdiS1Form;
use common\models\S7Akreditasi;
use common\models\S7BorangS1Fakultas;
use common\models\S7BorangS1Prodi;
use common\models\S7DokumentasiS1Fakultas;
use common\models\S7DokumentasiS1Prodi;
use common\models\ProgramStudi;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use common\models\S7AkreditasiProdiS1;
use admin\models\S7AkreditasiProdiS1Search;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AkreditasiProdiS1Controller implements the CRUD actions for S7AkreditasiProdiS1 model.
 */
class AkreditasiProdiS1Controller extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    ['actions'=>['index','create','update','view','delete'],
                     'allow'=>true,
                     'roles'=>['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all S7AkreditasiProdiS1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new S7AkreditasiProdiS1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single S7AkreditasiProdiS1 model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new S7AkreditasiProdiS1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new AkreditasiProdiS1Form();
        $idAkreditasi = S7Akreditasi::find()->all();
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id','nama');

        $idProdi = ProgramStudi::find()->where(['jenjang'=>'S1'])->all();
        $dataProdi = ArrayHelper::map($idProdi,'id',function($data){
            return $data->nama . " ({$data->jenjang})";
        });

        if($model->load(Yii::$app->request->post())){
            if($model->createAkreditasi()) {
                Yii::$app->session->setFlash('success', 'Berhasil membuat entry akreditasi');
                return $this->redirect(['akreditasi-prodi-s1/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProdi'=>$dataProdi,
        ]);
    }

    /**
     * Updates an existing S7AkreditasiProdiS1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $idAkreditasi = S7Akreditasi::find()->all();
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id','nama');

        $idProdi = ProgramStudi::find()->where(['jenjang'=>'S1'])->all();
        $dataProdi = ArrayHelper::map($idProdi,'id',function($data){
            return $data->nama . " ({$data->jenjang})";
        });


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProdi'=>$dataProdi,
        ]);
    }

    /**
     * Deletes an existing S7AkreditasiProdiS1 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the S7AkreditasiProdiS1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return S7AkreditasiProdiS1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = S7AkreditasiProdiS1::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
