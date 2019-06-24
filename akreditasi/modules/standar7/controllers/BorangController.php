<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\FakultasAkademi;
use common\models\PencarianBorangFakultasForm;
use common\models\S7Akreditasi;
use common\models\PencarianBorangInstitusiForm;
use common\models\PencarianBorangProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class BorangController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    ['actions' => ['arsipBorang', 'cariProdi', 'cariFakultas'],
                        'allow' => true,
                        'roles' => ['adminLpm', 'superUser', 'adminFakultas', 'userFakultas','adminProdi','userProdi']
                    ],

                ]
            ],
        ];
    }
    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionArsipBorang($target){


        $model = new PencarianBorangProdiForm();
        $modelFakultas = new PencarianBorangFakultasForm();
        $modelInstitusi = new PencarianBorangInstitusiForm();
        $idAkreditasiProdi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>2]);
        $dataAkreditasiProdi = ArrayHelper::map($idAkreditasiProdi,'id',function($data){
           return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });
        if(Yii::$app->user->identity->profilUser->id_fakultas != null){

            $data = FakultasAkademi::find()->where(['id'=>Yii::$app->user->identity->profilUser->id_fakultas])->all();
        }
        else{
            $data = FakultasAkademi::find()->all();

        }

        $dataFakultas = ArrayHelper::map($data,'id','nama');

        $idAkreditasiInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
        $dataAkreditasiInstitusi = ArrayHelper::map($idAkreditasiInstitusi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });


        $prodi = Yii::$app->user->identity->profilUser->id_prodi;
        if($prodi){
            $p = ProgramStudi::findOne($prodi);

            if($p->jenjang == 'S1'){
                $dataProgram = ['S1'=>'Sarjana (S1)'];

            }else{
                $dataProgram = ['Pasca'=>'Pasca Sarjana'];

            }
        }else{
            $dataProgram = ['S1'=>'Sarjana (S1)','Pasca'=>'Pasca Sarjana'];

        }
        if($model->load(Yii::$app->request->post())){


            $url = $model->cari($target);
            $borang = $model->getBorang();
            if(!$borang){
                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
            }
            $borangId = $borang->id;

            $this->redirect([$url,'borang'=>$borangId]);

        }
        if($modelInstitusi->load(Yii::$app->request->post())){
            $url = $modelInstitusi->cari($target);
            $borang = $modelInstitusi->getBorang();
            if(!$borang){
                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
            }

            $borangId = $borang->id;
            $this->redirect([$url,'borang'=>$borangId]);
        }
        if($modelFakultas->load(Yii::$app->request->post())){


            $url = $modelFakultas->cari($target);
            $borang = $modelFakultas->getBorang();
            if(!$borang){
                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
            }

            $borangId = $borang->id;
            $this->redirect([$url,'borang'=>$borangId]);
        }
        return $this->render('arsip',[
            'model'=>$model,
            'dataAkreditasiProdi'=>$dataAkreditasiProdi,
            'dataAkreditasiInstitusi'=>$dataAkreditasiInstitusi,
            'dataProgram'=>$dataProgram,
            'modelInstitusi'=>$modelInstitusi,
            'modelFakultas'=>$modelFakultas,
            'dataFakultas'=>$dataFakultas
           ]);
    }

    public function actionCariProdi(){
        $this->enableCsrfValidation = false;

        Yii::$app->response->format = Response::FORMAT_JSON;
        $arrayProdi = [];

        if(isset($_POST['depdrop_parents'])){
            $parent = $_POST['depdrop_parents'];
            if($parent!==null){
                $id = $parent[0];
                if(Yii::$app->user->identity->profilUser->id_prodi != null){

                    $dataProdi = ProgramStudi::findAll(['jenjang'=>$id,'id'=>Yii::$app->user->identity->profilUser->id_prodi]);
                }
                else{
                    $dataProdi = ProgramStudi::find()->all();

                }
                foreach ($dataProdi as $data){
                    $id = $data->id;
                    $nama = $data->nama;
                    $newArray = ['id'=>$id,'name'=>$nama];
                    $arrayProdi[] = $newArray;
                }

                return ['output'=>$arrayProdi, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function actionCariFakultas(){
        $this->enableCsrfValidation = false;

        Yii::$app->response->format = Response::FORMAT_JSON;
        $arrayProdi = [];

        if(isset($_POST['depdrop_parents'])){
            $parent = $_POST['depdrop_parents'];
            if($parent!==null){
                $id = $parent[0];
                if(Yii::$app->user->identity->profilUser->id_fakultas_akademi != null){

                    $dataFakultas = FakultasAkademi::find()->where(['id'=>Yii::$app->user->identity->profilUser->id_fakultas_akademi])->all();
                }
                else{
                    $dataFakultas = FakultasAkademi::find()->all();

                }
                foreach ($dataFakultas as $data){
                    $id = $data->id;
                    $nama = $data->nama;
                    $newArray = ['id'=>$id,'name'=>$nama];
                    $arrayProdi[] = $newArray;
                }

                return ['output'=>$arrayProdi, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }
    public function beforeAction($action)
    {
        $this->layout="main";
        if($this->action->id === 'cari-prodi'){
            $this->enableCsrfValidation = false;
        }
        if($this->action->id === 'cari-fakultas'){
            $this->enableCsrfValidation = false;
        }

        return true;
    }



}
