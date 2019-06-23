<?php

namespace admin\controllers;


use admin\models\SertifikatInstitusiForm;
use Yii;
use yii\filters\AccessControl;
use common\models\sertifikat\SertifikatInstitusi;
use common\models\sertifikat\SertifikatInstitusiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * SertifikatInstitusiController implements the CRUD actions for SertifikatInstitusi model.
 */
class SertifikatInstitusiController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }
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
     * Lists all SertifikatInstitusi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SertifikatInstitusiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SertifikatInstitusi model.
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
     * Creates a new SertifikatInstitusi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SertifikatInstitusi();
//        $modelForm = new SertifikatInstitusiForm();

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

                $model->save(false);




            return $this->redirect(['view', 'id' => $model->id]);



        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing SertifikatInstitusi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SertifikatInstitusi model.
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
     * Finds the SertifikatInstitusi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SertifikatInstitusi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SertifikatInstitusi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
