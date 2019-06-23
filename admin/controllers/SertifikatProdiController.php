<?php

namespace admin\controllers;


use common\models\ProgramStudi;
use DateTime;
use Yii;
use yii\filters\AccessControl;
use common\models\sertifikat\SertifikatProdi;
use common\models\sertifikat\SertifikatProdiSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SertifikatProdiController implements the CRUD actions for SertifikatProdi model.
 */
class SertifikatProdiController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }
    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            'access'=>[
//                'class'=>AccessControl::className(),
//                'rules'=>[
//                    ['actions'=>['index','create','update','view','delete'],
//                     'allow'=>true,
//                     'roles'=>['@']
//                    ]
//                ]
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all SertifikatProdi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SertifikatProdiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SertifikatProdi model.
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
     * Creates a new SertifikatProdi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SertifikatProdi();

        $idProdi = ProgramStudi::find()->all();
        $dataProdi = ArrayHelper::map($idProdi,'id',function($data){
            return $data->nama . " ({$data->jenjang})";
        });

//        var_dump($dataProdi);
//        exit();

        if ($model->load(Yii::$app->request->post()) ) {

            $file = UploadedFile::getInstance($model, 'sertifikat');
            $path = Yii::getAlias('@uploadAkreditasi/sertifikat');

//                FileHelper::createDirectory($path, $mode = 0777, $recursive = true);

            $fileName = $file->getBaseName().'.'.$file->getExtension();
            $model->sertifikat = $fileName;
            $file->saveAs($path.'/'.$fileName);

            $doksk = UploadedFile::getInstance($model, 'dokumen_sk');
            $fileNameSk = $doksk->getBaseName().'.'.$doksk->getExtension();
            $model->dokumen_sk = $fileNameSk;
            $doksk->saveAs($path.'/'.$fileNameSk);

//                tgl akreditasi
            $tgl_akre = $model->tgl_akreditasi;
            $tgl_kdl = $model->tgl_kadaluarsa;
            $tgl_aju = $model->tanggal_pengajuan;
            $tgl_terima = $model->tanggal_diterima;

            $konversi_akre = DateTime::createFromFormat('d-M-Y', $tgl_akre);
            $format_akre = $konversi_akre->format('U');

            $konversi_kdl = DateTime::createFromFormat('d-M-Y', $tgl_kdl);
            $format_kdl = $konversi_kdl->format('U');

            $konversi_aju = DateTime::createFromFormat('d-M-Y', $tgl_aju);
            $format_aju = $konversi_aju->format('U');

            $konversi_terima = DateTime::createFromFormat('d-M-Y', $tgl_terima);
            $format_terima = $konversi_terima->format('U');

            $model->tgl_akreditasi = $format_akre;
            $model->tgl_kadaluarsa = $format_kdl;
            $model->tanggal_diterima = $format_terima;
            $model->tanggal_pengajuan = $format_aju;

            $model->save(false);
            return $this->redirect(['sertifikat-prodi/index']);
        }

        return $this->render('create', [
            'model' => $model,
            'dataProdi'=> $dataProdi
        ]);
    }

    /**
     * Updates an existing SertifikatProdi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $konversi_aju = DateTime::createFromFormat('U', $model->tanggal_pengajuan);
        $format_aju = $konversi_aju->format('d-M-Y');

        $model->tanggal_pengajuan = $format_aju;

        $konversi_terima = DateTime::createFromFormat('U', $model->tanggal_diterima);
        $format_terima = $konversi_terima->format('d-M-Y');

        $model->tanggal_diterima = $format_terima;

        $konversi_akre = DateTime::createFromFormat('U', $model->tgl_akreditasi);
        $format_akre = $konversi_akre->format('d-M-Y');

        $model->tgl_akreditasi = $format_akre;

        $konversi_kdl = DateTime::createFromFormat('U', $model->tgl_kadaluarsa);
        $format_kdl = $konversi_kdl->format('d-M-Y');

        $model->tgl_kadaluarsa= $format_kdl;

        if ($model->load(Yii::$app->request->post()) ) {
            $tgl_akre = $model->tgl_akreditasi;
            $tgl_kdl = $model->tgl_kadaluarsa;
            $tgl_aju = $model->tanggal_pengajuan;
            $tgl_terima = $model->tanggal_diterima;

            $konversi_akre = DateTime::createFromFormat('d-M-Y', $tgl_akre);
            $format_akre = $konversi_akre->format('U');

            $konversi_kdl = DateTime::createFromFormat('d-M-Y', $tgl_kdl);
            $format_kdl = $konversi_kdl->format('U');

            $konversi_aju = DateTime::createFromFormat('d-M-Y', $tgl_aju);
            $format_aju = $konversi_aju->format('U');

            $konversi_terima = DateTime::createFromFormat('d-M-Y', $tgl_terima);
            $format_terima = $konversi_terima->format('U');

            $model->tgl_akreditasi = $format_akre;
            $model->tgl_kadaluarsa = $format_kdl;
            $model->tanggal_diterima = $format_terima;
            $model->tanggal_pengajuan = $format_aju;

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SertifikatProdi model.
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

    public function actionDownload($id){
        $model = $this->findModel($id);
        $file = Yii::getAlias(Url::to('@uploadAkreditasi/sertifikat/'.$model->sertifikat));
        return Yii::$app->response->sendFile($file);
    }

    /**
     * Finds the SertifikatProdi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SertifikatProdi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SertifikatProdi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
