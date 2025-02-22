<?php

namespace akreditasi\controllers;

use common\models\CreateUserForm;
use common\models\FakultasAkademi;
use common\models\ProgramStudi;
use common\models\UpdateUserForm;
use common\models\UserPasswordForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use common\models\User;
use admin\models\UserSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//            'access'=>[
//                'class'=>AccessControl::className(),
//                'rules'=>[
//                    ['actions'=>['index','create','update','view','delete','get-prodi'],
//                     'allow'=>true,
//                     'roles'=>['@']
//                    ]
//                ]
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        $id = Yii::$app->user->identity->getId();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {

        $id = Yii::$app->user->identity->getId();
        $model = new UpdateUserForm($id);
        $modelPassword = new UserPasswordForm($id);
        $fakultas = FakultasAkademi::find()->all();
        $dataFakultas = ArrayHelper::map($fakultas,'id','nama');

        if ($model->load(Yii::$app->request->post()) ) {
            if(!$model->validate()){
                throw new InvalidArgumentException('Gagal Validasi user');
            }
            $model->updateUser();
            if($model === false){
                throw new InvalidArgumentException('Gagal membuat user, terdapat error');

            }

            return $this->redirect(['view', 'id' => $model->getUser()->id]);
        }
        if($modelPassword->load(Yii::$app->request->post())){

            $modelPassword->updatePassword();
            if(!$modelPassword){
                throw new InvalidArgumentException('Gagal Mengganti Password');
            }
            Yii::$app->session->setFlash('success','Berhasil mengganti Password');
            return $this->redirect(['view']);


        }

        return $this->render('update_user_form', [
            'model' => $model,
            'modelPassword'=>$modelPassword,
            'dataFakultas'=>$dataFakultas
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetFakultas(){
        $fakultas = FakultasAkademi::find()->all();
        return ArrayHelper::map($fakultas,'id','nama');
    }

    public function actionGetProdi(){

        $this->enableCsrfValidation = false;
        $arrayProdi = [];

        if(isset($_POST['depdrop_parents'])){
            $parent = $_POST['depdrop_parents'];
            if($parent!==null){
                $id = $parent[0];
                $dataProdi = ProgramStudi::findAll(['id_fakultas_akademi'=>$id]);
                foreach ($dataProdi as $data){
                    $id = $data->id;
                    $nama = $data->nama . '('.$data->jenjang.')';
                    $newArray = ['id'=>$id,'name'=>$nama];
                    $arrayProdi[] = $newArray;
                }

                echo Json::encode(['output'=>$arrayProdi, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    public function beforeAction($action)
    {
        if ($this->action->id === 'get-prodi') {
            $this->enableCsrfValidation = false;
        }
        return true;
    }
}
