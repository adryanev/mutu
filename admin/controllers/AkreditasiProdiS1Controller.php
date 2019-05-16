<?php

namespace admin\controllers;

use common\models\Akreditasi;
use common\models\BorangS1Fakultas;
use common\models\BorangS1Prodi;
use common\models\DokumentasiS1Fakultas;
use common\models\DokumentasiS1Prodi;
use common\models\ProgramStudi;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use common\models\AkreditasiProdiS1;
use admin\models\AkreditasiProdiS1Search;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AkreditasiProdiS1Controller implements the CRUD actions for AkreditasiProdiS1 model.
 */
class AkreditasiProdiS1Controller extends Controller
{
    const S1 = 1;
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
     * Lists all AkreditasiProdiS1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AkreditasiProdiS1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AkreditasiProdiS1 model.
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
     * Creates a new AkreditasiProdiS1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new AkreditasiProdiS1();
        $idAkreditasi = Akreditasi::find()->all();
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id','nama');

        $idProdi = ProgramStudi::find()->where(['id_program'=>self::S1])->all();
        $dataProdi = ArrayHelper::map($idProdi,'id','nama');

        $path = Yii::getAlias('@uploadAkreditasi'. '/BAN-PT/prodi');

        if ($model->load(Yii::$app->request->post()) ) {

            $model->progress = 0;

            $pathP = $path. "/{$model->akreditasi->tahun}/{$model->id_prodi}/prodi";
            $pathBorang = $pathP . '/borang';
            $pathDokumentasi = $pathP. '/dokumentasi';
            $pathGambar = $pathP. '/gambar';


            if(!file_exists($pathBorang) && !mkdir($pathBorang, 0777, true) && !is_dir($pathBorang)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathBorang));
            }

            if(!file_exists($pathDokumentasi) && !mkdir($pathDokumentasi, 0777, true) && !is_dir($pathDokumentasi)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathDokumentasi));
            }

            if(!file_exists($pathGambar) && !mkdir($pathGambar, 0777, true) && !is_dir($pathGambar)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathGambar));
            }



            $pathF = $path. "/{$model->akreditasi->tahun}/{$model->id_prodi}/fakultas";
            $pathFBorang = $pathF . '/borang';
            $pathFDokumentasi = $pathF. '/dokumentasi';
            $pathFGambar = $pathF. '/gambar';


            if(!file_exists($pathFBorang) && !mkdir($pathFBorang, 0777, true) && !is_dir($pathFBorang)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathFBorang));
            }

            if(!file_exists($pathFDokumentasi) && !mkdir($pathFDokumentasi, 0777, true) && !is_dir($pathFDokumentasi)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathFDokumentasi));
            }

            if(!file_exists($pathFGambar) && !mkdir($pathFGambar, 0777, true) && !is_dir($pathFGambar)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathFGambar));
            }
            $model->save();

            $transaction = Yii::$app->db->beginTransaction();

            $borangProdi = new BorangS1Prodi();
            $borangFakultas = new BorangS1Fakultas();

            $borangProdi->id_akreditasi_prodi_s1 = $model->id;
            $borangProdi->progress = 0;
            $borangFakultas->id_akreditasi_prodi_s1 = $model->id;
            $borangFakultas->progress = 0;

            if(!$borangProdi->save(false) ){
                $transaction->rollBack();
                throw new InvalidArgumentException($borangProdi->errors );
            }
            if(!$borangFakultas->save(false)){
                $transaction->rollBack();
                throw new InvalidArgumentException($borangFakultas->errors );
            }

            $dokumentasiProdi = new DokumentasiS1Prodi();
            $dokumentasiFakultas = new DokumentasiS1Fakultas();

            $dokumentasiProdi->id_akreditasi_prodi_s1 = $model->id;
            $dokumentasiProdi->progress = 0;
            $dokumentasiProdi->is_publik = 0;
            $dokumentasiFakultas->id_akreditasi_prodi_s1 = $model->id;
            $dokumentasiFakultas->progress=0;
            $dokumentasiFakultas->is_publik = 0;

            if(!$dokumentasiProdi->save() ){
                $transaction->rollBack();
                throw new InvalidArgumentException($dokumentasiProdi->errors);

            }
            if(!$dokumentasiFakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($dokumentasiFakultas->errors);
            }

            $transaction->commit();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProdi'=>$dataProdi,
        ]);
    }

    /**
     * Updates an existing AkreditasiProdiS1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $idAkreditasi = Akreditasi::find()->all();
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id','nama');

        $idProdi = ProgramStudi::find()->where(['id_program'=>self::S1])->all();
        $dataProdi = ArrayHelper::map($idProdi,'id','nama');


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
     * Deletes an existing AkreditasiProdiS1 model.
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
     * Finds the AkreditasiProdiS1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AkreditasiProdiS1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AkreditasiProdiS1::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
