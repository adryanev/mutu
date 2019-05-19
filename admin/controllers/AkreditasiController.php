<?php

namespace admin\controllers;

use common\models\JenisAkreditasi;
use Yii;
use yii\filters\AccessControl;
use common\models\Akreditasi;
use admin\models\AkreditasiSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AkreditasiController implements the CRUD actions for Akreditasi model.
 */
class AkreditasiController extends Controller
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
     * Lists all Akreditasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AkreditasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Akreditasi model.
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
     * Creates a new Akreditasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Akreditasi();

        $jenisAkreditasi = JenisAkreditasi::find()->all();
        $dataJenisAkreditasi = ArrayHelper::map($jenisAkreditasi,'id','nama');

        $akreditasiProdi = 'Program Studi';
        $akreditasiInstitusi = 'Institusi';

        $path = Yii::getAlias('@uploadAkreditasi');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            switch (strtolower($model->jenisAkreditasi->nama)){
                case strtolower($akreditasiProdi):
                    $path .= "/$model->lembaga/prodi/$model->tahun/";
                    break;
                case strtolower($akreditasiInstitusi):
                    $path .= "/$model->lembaga/institusi/$model->tahun/";
                    break;
            }

            if(!file_exists($path) && !mkdir($path, 0777, true) && !is_dir($path)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $path));
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dataJenisAkreditasi'=>$dataJenisAkreditasi
        ]);
    }

    /**
     * Updates an existing Akreditasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $jenisAkreditasi = JenisAkreditasi::find()->all();
        $dataJenisAkreditasi = ArrayHelper::map($jenisAkreditasi,'id','nama');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dataJenisAkreditasi'=>$dataJenisAkreditasi
        ]);
    }

    /**
     * Deletes an existing Akreditasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Akreditasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Akreditasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Akreditasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
