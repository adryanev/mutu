<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\FakultasAkademi;
use common\models\PencarianDokumentasiFakultasForm;
use Yii;
use common\models\S7Akreditasi;
use common\models\PencarianDokumentasiProdiForm;
use common\models\PencarianDokumentasiInstitusiForm;
//use common\models\Program;
use common\models\ProgramStudi;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DokumentasiController extends \yii\web\Controller
{


    public function actionArsipDok($target){

        $model = new PencarianDokumentasiProdiForm();
        $modelFakultas = new PencarianDokumentasiFakultasForm();
        $modelInstitusi = new PencarianDokumentasiInstitusiForm();

        $idAkreditasi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>2]);
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });

        $idAkreditasiInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
        $dataAkreditasiInstitusi = ArrayHelper::map($idAkreditasiInstitusi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });

//        $dataProgram = ArrayHelper::map(ProgramStudi::find()->all(),'id','jenjang');
        $dataProgram = ['S1'=>'S1','S2'=>'S2'];
        if($model->load(\Yii::$app->request->post())){

            $url = $model->cari($target);
            $dokumentasi = $model->getDokumentasi();
            if(!$dokumentasi){
                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
            }
            $dokId = $dokumentasi->id;
            $this->redirect([$url,'dokumentasi'=>$dokId]);

        }
        if($modelInstitusi->load(Yii::$app->request->post())){
            $url = $modelInstitusi->cari($target);
            $dokumentasi = $modelInstitusi->getDok();
            if(!$dokumentasi){
                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
            }

            $dokId = $dokumentasi->id;
            $this->redirect([$url,'dokumentasi'=>$dokId]);
        }
        if($modelFakultas->load(Yii::$app->request->post())){


            $url = $modelFakultas->cari($target);
            $dokumentasi = $modelFakultas->getDokumentasi();
            if(!$dokumentasi){
                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
            }

            $dokumentasiId = $dokumentasi->id;
            $this->redirect([$url,'dokumentasi'=>$dokumentasiId]);
        }

        return $this->render('cari_dok',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataAkreditasiInstitusi'=>$dataAkreditasiInstitusi,
            'dataProgram'=>$dataProgram,
            'modelInstitusi'=>$modelInstitusi,
            'modelFakultas'=>$modelFakultas,
            'target'=>$target

        ]);

    }



    public function actionCariDok(){

        $this->enableCsrfValidation = false;

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $arrayProdi = [];

        if(isset($_POST['depdrop_parents'])){
            $parent = $_POST['depdrop_parents'];
            if($parent!==null){
                $id = $parent[0];
                $dataProdi = ProgramStudi::findAll(['jenjang'=>$id]);
                foreach ($dataProdi as $data){
                    $id = $data->id;
                    $nama = $data->nama . '('.$data->jenjang.')';
                    $newArray = ['id'=>$id,'name'=>$nama];
                    $arrayProdi[] = $newArray;
                }


                return['output'=>$arrayProdi, 'selected'=>''];
            }
        }
        return['output'=>'', 'selected'=>''];

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
