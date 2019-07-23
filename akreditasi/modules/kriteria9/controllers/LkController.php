<?php

namespace akreditasi\modules\kriteria9\controllers;

use common\models\FakultasAkademi;
use common\models\PencarianDokumentasiFakultasForm;
use common\models\PencarianDokumentasiInstitusiForm;
use common\models\PencarianDokumentasiProdiForm;
use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use Yii;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class LkController extends \yii\web\Controller
{
    public function actionArsipLk(){

//        $model = new PencarianDokumentasiProdiForm();
//        $modelFakultas = new PencarianDokumentasiFakultasForm();
//        $modelInstitusi = new PencarianDokumentasiInstitusiForm();
//
//        $idAkreditasi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>2]);
//        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
//            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
//        });
//
//        $idAkreditasiInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
//        $dataAkreditasiInstitusi = ArrayHelper::map($idAkreditasiInstitusi,'id',function($data){
//            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
//        });
//
////        $dataProgram = ArrayHelper::map(ProgramStudi::find()->all(),'id','jenjang');
//        $dataProgram = ['S1'=>'S1','S2'=>'S2'];
//        if($model->load(\Yii::$app->request->post())){
//
//            $url = $model->cari($target);
//            $dokumentasi = $model->getDokumentasi();
//            if(!$dokumentasi){
//                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
//            }
//            $dokId = $dokumentasi->id;
//            $this->redirect([$url,'dokumentasi'=>$dokId]);
//
//        }
//        if($modelInstitusi->load(Yii::$app->request->post())){
//            $url = $modelInstitusi->cari($target);
//            $dokumentasi = $modelInstitusi->getDok();
//            if(!$dokumentasi){
//                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
//            }
//
//            $dokId = $dokumentasi->id;
//            $this->redirect([$url,'dokumentasi'=>$dokId]);
//        }
//        if($modelFakultas->load(Yii::$app->request->post())){
//
//
//            $url = $modelFakultas->cari($target);
//            $dokumentasi = $modelFakultas->getDokumentasi();
//            if(!$dokumentasi){
//                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
//            }
//
//            $dokumentasiId = $dokumentasi->id;
//            $this->redirect([$url,'dokumentasi'=>$dokumentasiId]);
//        }

        $model = new DynamicModel(['akreditasi','jenjang','id_prodi','lk_untuk']);
        $model->addRule('akreditasi','required');
        $model->addRule('jenjang','required');
        $model->addRule('id_prodi','required');

        $dataAkreditasi = [1=>'Akreditasi Program Studi (2019)'];
        $dataAkreditasiInstitusi = [1=>'Akreditasi Institusi (2019)'];
        $dataProgram = ['S1'=>'S1','S2'=>'S2'];

        $modelInstitusi = new DynamicModel(['akreditasi','lk_untuk']);
        $modelInstitusi->addRule('akreditasi','required');
        $modelInstitusi->addRule('untuk','required');


        $modelFakultas = new DynamicModel(['akreditasi','jenjang','id_fakultas','lk_untuk']);
        $modelFakultas->addRule('akreditasi','required');
        $modelFakultas->addRule('id_fakultas','required');
        $modelInstitusi->addRule('jenjang','required');
        $modelInstitusi->addRule('lk_untuk','required');


        if($model->load(Yii::$app->request->post())){
            return $this->redirect(['lk-prodi-s1/isi','dokumentasi'=>1]);

        }

        if($modelFakultas->load(Yii::$app->request->post())){
            return $this->redirect(['lk-fakultas/isi','dokumentasi'=>1]);

        }

        $target = 'isi';
        if($modelInstitusi->load(Yii::$app->request->post())){

            return $this->redirect(['lk-institusi/isi','dokumentasi'=>1]);
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



    public function actionCariProdi(){

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
