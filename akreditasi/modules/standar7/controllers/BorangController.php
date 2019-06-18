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
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class BorangController extends \yii\web\Controller
{

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

        $idAkreditasiInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
        $dataAkreditasiInstitusi = ArrayHelper::map($idAkreditasiInstitusi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });


        $dataProgram =['S1'=>'S1','S2'=>'S2','S3'=>'S3','Diploma'=>'Diploma'];
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
            'modelFakultas'=>$modelFakultas
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
                $dataProdi = ProgramStudi::findAll(['jenjang'=>$id]);
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
                $dataFakultas = FakultasAkademi::find()->all();
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
