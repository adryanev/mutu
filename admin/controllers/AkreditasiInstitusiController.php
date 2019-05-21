<?php

namespace admin\controllers;

use admin\models\AkreditasiInstitusiForm;
use common\models\Akreditasi;
use common\models\JenisAkreditasi;
use Yii;
use yii\filters\AccessControl;
use common\models\AkreditasiInstitusi;
use admin\models\AkreditasiInstitusiSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AkreditasiInstitusiController implements the CRUD actions for AkreditasiInstitusi model.
 */
class AkreditasiInstitusiController extends Controller
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
     * Lists all AkreditasiInstitusi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AkreditasiInstitusiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AkreditasiInstitusi model.
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
     * Creates a new AkreditasiInstitusi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AkreditasiInstitusiForm();
        $jenisAkred = JenisAkreditasi::findOne(['nama'=>'Institusi']);
        $idAkreditasi = Akreditasi::findAll(['id_jenis_akreditasi'=>$jenisAkred->id]);
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function ($data){
            return "{$data->lembaga} - {$data->nama} ({$data->tahun})";
        });


        if ($model->load(Yii::$app->request->post())) {
            if($model->createAkreditasiInstitusi()){
                Yii::$app->session->setFlash('success', 'Berhasil membuat entry akreditasi institusi');

                return $this->redirect(['akreditasi-institusi/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataAkreditasi'=>$dataAkreditasi
        ]);
    }

    /**
     * Updates an existing AkreditasiInstitusi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = AkreditasiInstitusiForm::findOne($id);
        $jenisAkred = JenisAkreditasi::findOne(['nama'=>'Institusi']);
        $idAkreditasi = Akreditasi::findAll(['id_jenis_akreditasi'=>$jenisAkred->id]);
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function ($data){
            return "{$data->lembaga} - {$data->nama} ({$data->tahun})";
        });
        if ($model->load(Yii::$app->request->post())) {
            if($model->updateAkreditasiInstitusi()){
                Yii::$app->session->setFlash('success', 'Berhasil memperbarui akreditasi institusi');

                return $this->redirect(['akreditasi-institusi/index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataAkreditasi'=>$dataAkreditasi
        ]);
    }

    /**
     * Deletes an existing AkreditasiInstitusi model.
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
     * Finds the AkreditasiInstitusi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AkreditasiInstitusi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AkreditasiInstitusi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
