<?php

namespace akreditasi\modules\standar7\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\sertifikat\SertifikatInstitusi;
use common\models\sertifikat\SertifikatInstitusiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
